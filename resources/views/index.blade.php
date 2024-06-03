<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA Astronomy Picture of the Day</title>
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

<main class="w-full h-screen">
    <!-- Slideshow Container -->
    <section class="relative w-full h-full overflow-hidden">
        @if(isset($images))
            @foreach($images as $image)
                <article class="mySlides fade absolute inset-0 hidden">
                    <figure class="relative w-full h-full">
                        <img src="{{ $image['url'] }}" alt="{{ $image['title'] }}" class="w-full h-full object-cover">
                    </figure>
                    <aside class="text-gray-900 bg-white bg-opacity-75 p-4 absolute bottom-0 left-0 right-0">
                        <h2 class="text-xl font-semibold">{{ $image['title'] }} - {{ $image['date'] }}</h2>
                        <!-- Uncomment if you want to show explanation -->
                        <!-- <p>{{ $image['explanation'] }}</p> -->
                    </aside>
                </article>
            @endforeach
        @elseif(isset($error))
            <p class="text-center text-red-500">{{ $error }}</p>
        @endif

        <!-- Navigation arrows -->
        <button class="absolute left-0 top-1/2 transform -translate-y-1/2 prev text-white bg-gray-900 rounded-full px-4 py-2" aria-label="Previous slide" onclick="plusSlides(-1)">&#10094;</button>
        <button class="absolute right-0 top-1/2 transform -translate-y-1/2 next text-white bg-gray-900 rounded-full px-4 py-2" aria-label="Next slide" onclick="plusSlides(1)">&#10095;</button>
    </section>
</main>

<script src="{{ asset('script.js') }}"></script>
</body>

</html>
