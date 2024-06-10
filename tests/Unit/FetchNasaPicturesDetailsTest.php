<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Dailypicture;
use Carbon\Carbon;

class FetchNasaPicturesDetailsTest extends TestCase
{
    public function testFetchPictureDetails()
    {
        $apiKey = 'CVPoEchCwHetYLskjMO89Ow5pP58bJCEDFsRpf5e';
        $date = Carbon::now()->subDays(1)->format('Y-m-d');

        // Mocking the NASA API response for a specific date
        Http::fake([
            "https://api.nasa.gov/planetary/apod?api_key={$apiKey}&date={$date}" => Http::response([
                'date' => $date,
                'title' => 'Mock Title',
                'url' => 'https://example.com/image.jpg',
                'explanation' => 'Mock Explanation',
            ], 200)
        ]);

        // Instantiate the controller
        $controller = new Dailypicture();

        // Call the method and capture the view response
        $response = $controller->show($date);

        // Check that the view is returned
        $this->assertInstanceOf('Illuminate\View\View', $response);

        // Verify that the view has the expected data
        $data = $response->getData();
        $this->assertEquals('Mock Title', $data['image']['title']);
        $this->assertEquals('Mock Explanation', $data['image']['explanation']);
    }
}
