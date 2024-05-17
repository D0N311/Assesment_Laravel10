<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\delIPRequest;
use App\Http\Requests\IPRequest;
use App\Models\Log;
use Illuminate\Http\Request;

class IpController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function showIP (Request $request) {
        $ip = $request->ipinfo->ip;
        Log::create(['controller' => 'IpController', 'function' => 'showIP', 'data' => $ip]);
        return response()->json(['ip' => $request->ipinfo->ip]);
    }

    public function showLocation (IPRequest $request) {

        $response = $this->client->request('GET', 'https://ipinfo.io/' . $request->input('ip') . '/json?token=' . env('IPINFO_SECRET'));
        
        $data = json_decode($response->getBody(), true);
        Log::create(['controller' => 'IpController', 'function' => 'showLocation', 'data' => json_encode($data)]);
        return response()->json([
            'IP Info' => $data,
        ]);
    }

    public function deleteLogs (delIPRequest $request) {
        
        $ids = $request->input('ids');
        Log::whereIn('id', $ids)->delete();
        Log::create(['controller' => 'IpController', 'function' => 'deleteLogs', 'data' => json_encode($ids)]);
        return response()->json([
            'message' => 'Logs deleted successfully',
        ]);
    }

}
