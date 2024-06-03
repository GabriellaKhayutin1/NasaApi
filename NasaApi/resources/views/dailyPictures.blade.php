<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA Daily Pictures</title>
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

<!-- Main Content -->
<main class="container mx-auto py-8">
    <section id="daily-pictures">
        <h2 class="text-2xl font-semibold text-center mb-6">Daily Pictures</h2>
        @if(isset($images))
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($images as $image)
                    <article class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ $image['url'] }}" class="w-full h-48 object-cover" alt="{{ $image['title'] }}">
                        <section class="p-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $image['title'] }}</h3>
                            <p class="text-gray-600">{{ $image['date'] }}</p>
                            <a href="{{ route('picture.show', ['date' => $image['date']]) }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-md">Read More</a>
                        </section>
                    </article>
                @endforeach
            </section>
        @elseif(isset($error))
            <p class="text-center text-red-500">{{ $error }}</p>
        @endif
    </section>
</main>

<script src="{{ asset('script.js') }}"></script>
</body>

</html>
