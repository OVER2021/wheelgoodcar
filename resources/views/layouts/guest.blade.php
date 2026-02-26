<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WheelGoodCars') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
.video-layer {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: opacity 0.6s ease-in-out;
}

.input-wrapper {
    background-color: #fbbf24;
    padding: 4px;
    border-radius: 12px;
}

.input-wrapper input {
    background-color: #ffffff;
    width: 100%;
    padding: 0.75rem;
    border-radius: 8px;
    border: none;
    outline: none;
    font-size: 1rem;
    color: #333;
}

.input-wrapper input:focus {
    box-shadow: 0 0 0 2px rgba(251, 191, 36, 0.6);
}
</style>

</head>

<body class="font-sans text-gray-900 antialiased">

<a href="{{ route('home') }}" class="fixed top-4 left-4 text-black z-50">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
</a>

<div class="min-h-screen grid grid-cols-1 md:grid-cols-2">
    <div class="flex flex-col justify-start pt-16 px-8 md:px-20 bg-cover bg-center"
         style="background-image: url('{{ asset('img/background/whitebackground.png') }}');">

        <img src="{{ asset('img/logo/WheelGoodCarsLogo (1).png') }}"
             alt="WheelGoodCars Logo"
             class="mx-auto mb-6"
             style="height:260px;width:300px;">

        <div class="w-full max-w-xl mx-auto">
            {{ $slot }}
        </div>
    </div>

    <div class="hidden md:block relative overflow-hidden">
        <video id="videoA" class="video-layer" autoplay muted playsinline></video>
        <video id="videoB" class="video-layer" muted playsinline style="opacity:0;"></video>
    </div>
</div>

<script>
    const videos = [
        "{{ asset('videos/snoopdog222.mp4') }}",
        "{{ asset('videos/snoopdogg3.mp4') }}"
    ];

    let index = 0;
    let active = 'A';

    const videoA = document.getElementById('videoA');
    const videoB = document.getElementById('videoB');

    videoA.src = videos[index];
    videoA.play();

    videoA.addEventListener('ended', switchVideo);
    videoB.addEventListener('ended', switchVideo);

    function switchVideo() {
        index = (index + 1) % videos.length;

        const current = active === 'A' ? videoA : videoB;
        const next = active === 'A' ? videoB : videoA;

        next.src = videos[index];
        next.currentTime = 0;
        next.play();

        next.style.opacity = 1;
        current.style.opacity = 0;

        active = active === 'A' ? 'B' : 'A';
    }
</script>

</body>
</html>
