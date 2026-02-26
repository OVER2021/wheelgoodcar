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

        <main class="hero-main" style="background-image: url('{{ asset('img/background/wheelgoodcarsbackground.png') }}');">
            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <h2 class="text-3xl font-bold text-center mb-10 text-white">Beschikbare auto’s</h2>

                <div>
                    <div class="flex justify-center mb-6">
                        <input type="text" placeholder="Zoek op merk" class="input-field">
                        <input type="text" placeholder="Zoek op model" class="input-field ml-4">
                    </div>

                    <div class="car-grid">
                        @foreach($cars as $car)
                            <a href="{{ route('cars.show', $car) }}" class="car-card block hover:scale-105 transition duration-200">
                                <img
                                    src="{{ $car->image ? asset('storage/'.$car->image) : asset('img/cars/default.jpg') }}"
                                    class="car-image"
                                    alt="{{ $car->make }} {{ $car->model }}">

                                <div class="car-body">
                                    <div class="car-title">
                                        {{ $car->make }} {{ $car->model }} ({{ $car->production_year }})
                                    </div>

                                    <div class="car-price">
                                        € {{ number_format($car->price, 2, ',', '.') }}
                                    </div>

                                    <div>{{ number_format($car->mileage) }} km</div>
                                    <div>{{ $car->color ?? 'Onbekend' }}</div>
                                    <div>{{ $car->weight ?? '-' }} kg</div>
                                    <div>{{ $car->views }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>