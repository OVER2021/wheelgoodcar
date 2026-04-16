<x-app-layout>
    <div class="min-h-screen flex flex-col">
        <header class="hero-header">
            <video class="hero-video" autoplay muted loop playsinline>
                <source src="{{ asset('videos/carvideo.mp4') }}" type="video/mp4">
            </video>

            <img src="{{ asset('img/logo/WheelGoodCarsLogo (1).png') }}" class="hero-logo" alt="WheelGood Cars">

            @guest
                <div class="hero-auth-buttons">
                    <a href="{{ route('login') }}" class="hero-button-small">Login</a>
                    <a href="{{ route('register') }}" class="hero-button-small">Register</a>
                </div>
            @endguest

            @auth
                <div class="hero-content-left">
                    <h1 class="hero-welcome">Welkom, {{ Auth::user()->name }}</h1>

                    @if(auth()->user()->isBeheerder())
                        <a href="{{ route('admin.dashboard') }}" class="hero-button">Admin dashboard</a>
                    @elseif(auth()->user()->isAanbieder())
                        <a href="{{ route('aanbieder.dashboard') }}" class="hero-button">Aanbieder dashboard</a>
                    @endif
                </div>
            @endauth
        </header>

        <main class="hero-main">

        <div class="all-cars-button-wrapper">
    <a href="{{ route('cars.all') }}" class="all-cars-button">
        Bekijk alle auto's →
    </a>
</div>

        <div class="car-grid mt-10">
                @foreach($cars as $car)
                <div class="car-card">
            <img src="{{ $car->image ? asset('storage/'.$car->image) : asset('img/cars/default.jpg') }}">

            <div class="car-body">
                <h1 class="car-title">
                    {{ $car->make }} {{ $car->model }}
                </h1>
            </div>
        </div>
            @endforeach
        </div>
    </div>
</main>
    </div>
</x-app-layout>