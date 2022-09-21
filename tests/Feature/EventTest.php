<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * Test: fetching all events
     *
     * @return void
     */
    public function testFetchingAllEvents(): void
    {
        $response = $this->get('/api/events');

        $response->assertJson([
            'success' => true,
            'message' => 'Events fetched successfully',
            'data' => []
        ]);
    }

    /**
     * Test: creating an event
     * @return void
     */
    public function testStoreEvent(): void
    {
        $response = $this->post('/api/events', [
            'title' => 'Test Event',
            'description' => 'Test Event Description',
            'location' => 'Test Event Location',
            'start_date' => '2021-01-01 00:00:00',
            'end_date' => '2021-01-01 00:00:00',
        ]);

        $response->assertJson([
            'success' => true,
            'message' => 'Event created successfully',
            'data' => [
                'title' => 'Test Event',
                'description' => 'Test Event Description',
                'location' => 'Test Event Location',
                'start_date' => '2021-01-01 00:00:00',
                'end_date' => '2021-01-01 00:00:00',
            ]
        ]);
    }

    /**
     * Test: creating an event with invalid data
     * @return void
     */
    public function testStoreMissingFields(): void
    {
        $response = $this->post('/api/events', [
            'description' => 'Test Event Description',
            'location' => 'Test Event Location',
            'start_date' => '2021-01-01 00:00:00',
        ]);

        $response->assertJson([
            'success' => false,
            'message' => 'Validation Error',
            'data' => [
                'title' => ['The title field is required.'],
            ]
        ]);
    }
}
