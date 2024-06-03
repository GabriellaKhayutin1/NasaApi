<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class Dailypicture extends Controller
{
    // Function to fetch daily pictures from NASA API
    public function daily()
    {
        $apiKey = 'CVPoEchCwHetYLskjMO89Ow5pP58bJCEDFsRpf5e';
        $endDate = Carbon::now()->format('Y-m-d');
        $startDate = Carbon::now()->subDays(3)->format('Y-m-d');

        try {
            $response1 = Http::get("https://api.nasa.gov/planetary/apod", [
                'api_key' => $apiKey,
                'start_date' => $startDate,
                'end_date' => $endDate
            ]);

            $response2 = Http::get("https://api.nasa.gov/planetary/apod", [
                'api_key' => $apiKey,
                'date' => Carbon::now()->subDays(4)->format('Y-m-d')
            ]);

            if ($response1->successful() && $response2->successful()) {
                $data = array_merge($response1->json(), [$response2->json()]);
                return view('dailyPictures', ['images' => $data]);
            } else {
                throw new \Exception('Failed to fetch data from NASA API');
            }

        } catch (\Exception $e) {
            Log::error('Error fetching data from NASA API: ' . $e->getMessage());
            return response()->view('errors.500', ['message' => $e->getMessage()], 500);
        }
    }

    // Function to show picture for a specific date
    public function show($date)
    {
        $apiKey = 'CVPoEchCwHetYLskjMO89Ow5pP58bJCEDFsRpf5e';

        try {
            $response = Http::get("https://api.nasa.gov/planetary/apod", [
                'api_key' => $apiKey,
                'date' => $date
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return view('picture', ['image' => $data]);
            } else {
                throw new \Exception('Failed to fetch data from NASA API');
            }
        } catch (\Exception $e) {
            Log::error('Error fetching data from NASA API: ' . $e->getMessage());
            return response()->view('errors.500', ['message' => $e->getMessage()], 500);
        }
    }
}
