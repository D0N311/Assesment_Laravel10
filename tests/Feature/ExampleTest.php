<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_ip_route_returns_a_successful_response(): void
    {
        $response = $this->get('/api/ip');

        $response->assertStatus(200);
    }
    public function test_the_location_route_returns_a_successful_response(): void
    {
        $response = $this->get('/api/location?ip=http://127.0.0.1:8000');
    
        $response->assertStatus(200);
    }

public function test_the_delete_logs_route_returns_a_successful_response(): void
{
    $data = ['ids' => [6, 8]];

    $response = $this->postJson('/api/delete', $data);

    $response->assertStatus(200);
}
    


}
