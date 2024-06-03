<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NasaController extends Controller
{
    // Function to fetch main pictures from NASA API
    public function index()
    {
        $apiKey = 'CVPoEchCwHetYLskjMO89Ow5pP58bJCEDFsRpf5e';

        try {
            // Fetch 5 random images
            $response = Http::get("https://api.nasa.gov/planetary/apod?api_key={$apiKey}&count=5");

            if ($response->successful()) {
                $data = $response->json();
                return view('index', ['images' => $data]);
            } else {
                throw new \Exception('Failed to fetch data from NASA API');
            }
        } catch (\Exception $e) {
            return response()->view('errors.500', ['message' => $e->getMessage()], 500);
        }
    }
}
