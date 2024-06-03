<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Dailypicture;
use Carbon\Carbon;

class FetchNasaPicturesTest extends TestCase
{
    public function testFetchDailyPictures()
    {
        $apiKey = 'CVPoEchCwHetYLskjMO89Ow5pP58bJCEDFsRpf5e';
        $endDate = Carbon::now()->format('Y-m-d');
        $startDate = Carbon::now()->subDays(3)->format('Y-m-d');

        // Mocking the NASA API response
        Http::fake([
            "https://api.nasa.gov/planetary/apod?api_key={$apiKey}&start_date={$startDate}&end_date={$endDate}" => Http::response([
                [
                    'date' => $endDate,
                    'title' => 'Mock Title 1',
                    'url' => 'https://example.com/image1.jpg',
                ],
                [
                    'date' => Carbon::now()->subDay()->format('Y-m-d'),
                    'title' => 'Mock Title 2',
                    'url' => 'https://example.com/image2.jpg',
                ]
            ], 200)
        ]);

        // Mocking the response for the date 4 days ago
        Http::fake([
            "https://api.nasa.gov/planetary/apod?api_key={$apiKey}&date=" . Carbon::now()->subDays(4)->format('Y-m-d') => Http::response([
                'date' => Carbon::now()->subDays(4)->format('Y-m-d'),
                'title' => 'Mock Title 3',
                'url' => 'https://example.com/image3.jpg',
            ], 200)
        ]);

        // Instantiate the controller
        $controller = new Dailypicture();

        // Call the method and capture the view response
        $response = $controller->daily();

        // Check that the view is returned
        $this->assertInstanceOf('Illuminate\View\View', $response);

        // Verify that the view has the expected data
        $data = $response->getData();
        $this->assertCount(3, $data['images']);
        $this->assertEquals('Mock Title 1', $data['images'][0]['title']);
    }
}
