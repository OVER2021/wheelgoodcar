<x-app-layout>
    <div class="dashboard-wrapper">
        <div class="dashboard-container">

            <div class="dashboard-header">
                <div>
                    <p class="dashboard-subtitle">Welkom {{ auth()->user()->name }}</p>
                </div>

                <div class="dashboard-actions">
                    <a href="{{ route('cars.create') }}" class="btn-primary">
                        + Auto toevoegen
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-danger">
                            Uitloggen
                        </button>
                    </form>
                </div>
            </div>

            <a href="{{ route('home') }}" class="btn-secondary">
                ← Terug naar home
            </a>

            <div class="dashboard-card">
                <div class="card-header">
                    <h2>Mijn aanbod:</h2>
                </div>

                @if(auth()->user()->cars->count())
                    @if(auth()->user()->cars->count())

                        <div class="offer-list">

                            @foreach(auth()->user()->cars->sortByDesc('created_at') as $car)

                                <div class="offer-item">

                                    <div class="offer-left">

                                        <div class="offer-image">
                                            <img src="{{ $car->image ? asset('storage/'.$car->image) : asset('img/cars/default.jpg') }}">
                                        </div>

                                        <div class="offer-details">

                                            <div class="offer-license">
                                                {{ $car->license_plate ?? 'ONBEKEND' }}
                                            </div>

                                            <div class="offer-title">
                                                {{ $car->make }} {{ $car->model }} {{ $car->production_year }}
                                            </div>

                                            <p id="status-{{ $car->id }}" style="font-weight:bold; margin-top:5px;">
                                                Status:
                                                <span style="color: {{ $car->isSold() ? 'red' : 'green' }}">
                                                    {{ $car->isSold() ? 'Verkocht' : 'Te koop' }}
                                                </span>
                                            </p>

                                        </div>

                                    </div>

                                    <div class="offer-price">
                                        €{{ number_format($car->price, 0, ',', '.') }}
                                    </div>

                                    <div class="offer-actions">

                                    <button
                                        type="button"
                                        onclick="toggleSold({{ $car->id }})"
                                        class="offer-edit"
                                        id="button-{{ $car->id }}"
                                        style="font-size: 14px;"
                                    >
                                        {{ $car->isSold() ? 'Te koop' : 'Verkocht' }}
                                    </button>

                                        <a href="{{ route('cars.edit', $car) }}" class="offer-edit">
                                            Bewerken
                                        </a>

                                        <form method="POST"
                                            action="{{ route('cars.destroy', $car) }}"
                                            onsubmit="return confirm('Weet je zeker?')">

                                            @csrf
                                            @method('DELETE')

                                            <button class="offer-delete">
                                                Verwijderen
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="empty-state">
                            <h3>Geen auto's gevonden</h3>
                            <p>Je hebt nog geen auto's geplaatst.</p>

                            <a href="{{ route('cars.create') }}" class="btn-primary">
                                Eerste auto toevoegen
                            </a>
                        </div>

                    @endif
                @else
                    <div class="empty-state">
                        <h3>Geen auto's gevonden</h3>
                        <p>Je hebt nog geen auto's geplaatst.</p>
                        <a href="{{ route('cars.create') }}" class="btn-primary">
                            Eerste auto toevoegen
                        </a>
                    </div>
                @endif
            </div>

        </div>
    </div>
    @vite('resources/js/dashboard.js')
</x-app-layout>