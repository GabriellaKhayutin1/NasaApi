<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Dailypicture extends Controller
{
    public function daily()
    {
        $apiKey = 'CVPoEchCwHetYLskjMO89Ow5pP58bJCEDFsRpf5e';
        $response = Http::get("https://api.nasa.gov/planetary/apod?api_key={$apiKey}");

        if ($response->successful()) {
            $data = $response->json();
            return view('dailyPictures', ['image' => $data]);
        } else {
            return view('dailyPictures', ['error' => 'Failed to fetch data from NASA API']);
        }
    }
}
