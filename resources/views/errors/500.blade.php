<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Server Error - 500</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="container mx-auto py-8 bg-white shadow-md rounded-lg p-6 text-center">
    <h1 class="text-2xl font-bold text-red-600">500</h1>
    <p class="text-lg mt-4">The server encountered an error and could not complete your request</p>
    <p class="text-md mt-2">{{ $message ?? 'An unexpected error occurred.' }}</p>
    <button onclick="location.href='{{ url('/') }}'" class="mt-6 px-4 py-2 bg-blue-600 text-white rounded-md">Go Back to the Home page</button>
</div>

</body>
</html>
