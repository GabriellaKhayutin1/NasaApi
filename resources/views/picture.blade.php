<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA Picture Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Responsive Navbar -->
<nav class="bg-gray-900 text-white py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center" id="myTopnav">
    <figure class="flex items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 mr-6">
    </figure>
    <aside class="flex space-x-4">
        <a href="{{ url('/') }}" class="text-lg font-semibold">Home</a>
        <a href="{{ url('/daily-pictures') }}" class="text-lg font-semibold ml-4">Daily Pictures</a>
    </aside>
</nav>

<!-- Picture Details Section -->
<main class="container mx-auto py-8">
    @if(isset($image))
        <article class="picture-details bg-white shadow-md rounded-lg overflow-hidden">
            <figure>
                <img src="{{ $image['url'] }}" alt="{{ $image['title'] }}" class="w-full">
                <figcaption class="p-4">
                    <h1 class="text-xl font-semibold mb-2">{{ $image['title'] }}</h1>
                    <p class="text-gray-600">{{ $image['date'] }}</p>
                    <p class="mt-2">{{ $image['explanation'] }}</p>
                    <a href="{{ url('/daily-pictures') }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-md">Back to Daily Pictures</a>
                </figcaption>
            </figure>
        </article>
    @elseif(isset($error))
        <p class="text-center text-red-500">{{ $error }}</p>
    @endif
</main>

<script src="{{ asset('script.js') }}"></script>
</body>
</html>
