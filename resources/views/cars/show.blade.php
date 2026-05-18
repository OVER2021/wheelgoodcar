<x-app-layout>
    <div class="car-show-wrapper">

        <div class="car-show-container">

            <div class="car-show-image">
                <img src="{{ $car->image ? asset('storage/'.$car->image) : asset('img/cars/default.jpg') }}">
            </div>

            <div class="car-show-content">

                <h1 class="car-show-title">
                    {{ $car->make }} {{ $car->model }}
                </h1>

                <div class="car-show-price">
                    € {{ number_format($car->price, 0, ',', '.') }}
                </div>

                <div class="car-show-details">
                    <p><strong>Bouwjaar:</strong> {{ $car->production_year }}</p>
                    <p><strong>Kilometerstand:</strong> {{ number_format($car->mileage) }} km</p>
                    <p><strong>Kleur:</strong> {{ $car->color ?? 'Onbekend' }}</p>
                    <p><strong>Gewicht:</strong> {{ $car->weight ?? '-' }} kg</p>
                    <p><strong>Deuren:</strong> {{ $car->doors ?? '-' }}</p>
                    <p><strong>Stoelen:</strong> {{ $car->seats ?? '-' }}</p>
                    <p><strong>Bekeken:</strong> {{ $car->views }}</p>
                </div>

                <a href="{{ route('home') }}" class="car-back-link">
                    ← Terug naar overzicht
                </a>

            </div>

        </div>

    </div>
</x-app-layout>