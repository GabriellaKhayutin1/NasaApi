<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA Astronomy Picture of the Day</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
<div class="topnav" id="myTopnav">
    <a href="#home" class="active">Home</a>
    <a href="#daily-pictures">Daily Pictures</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>

<div class="slideshow-container">
    @if(isset($image))
        <div class="mySlides fade">
            <img src="{{ $image['url'] }}" style="width:100%">
            <div class="text">{{ $image['title'] }} - {{ $image['date'] }}</div>
            <p>{{ $image['explanation'] }}</p>
        </div>
    @elseif(isset($error))
        <p>{{ $error }}</p>
    @endif

    <!-- Additional slides would go here -->

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<script src="{{ asset('script.js') }}"></script>
</body>
</html>
