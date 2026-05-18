<x-app-layout>
    <div class="dashboard-wrapper">
        <div class="dashboard-container">

            <div class="dashboard-header">
                <div>
                    <h1 class="dashboard-title">Dashboard</h1>
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

            <div class="dashboard-card">
                <div class="card-header">
                    <h2>Mijn auto’s</h2>
                    <span class="car-count">
                        {{ auth()->user()->cars->count() }} auto's
                    </span>
                </div>

                @if(auth()->user()->cars->count())
                    <div class="table-wrapper">
                        <table class="car-table">
                            <thead>
                                <tr>
                                    <th>Auto</th>
                                    <th>Prijs</th>
                                    <th>Geplaatst</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(auth()->user()->cars->sortByDesc('created_at') as $car)
                                    <tr>
                                        <td>
                                            <div class="car-info">
                                                <div class="car-name">
                                                    {{ $car->make }} {{ $car->model }}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="price">
                                            € {{ number_format($car->price) }}
                                        </td>

                                        <td class="date">
                                            {{ \Carbon\Carbon::parse($car->created_at)->locale('nl')->diffForHumans() }}
                                        </td>

                                        <td class="actions">
                                            <a href="{{ route('cars.edit', $car) }}" class="btn-edit">
                                                Bewerken
                                            </a>

                                            <form method="POST"
                                                  action="{{ route('cars.destroy', $car) }}"
                                                  onsubmit="return confirm('Weet je zeker?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-delete">
                                                    Verwijder
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
            </div>

        </div>
    </div>
</x-app-layout>