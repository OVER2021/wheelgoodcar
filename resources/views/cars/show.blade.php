<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <img
                        src="{{ $car->image ? asset('storage/'.$car->image) : asset('img/cars/default.jpg') }}"
                        alt="{{ $car->make }} {{ $car->model }}"
                        class="w-full h-full object-cover">
                </div>

                <div class="p-6">
                    <h1 class="text-3xl font-bold mb-4">
                        {{ $car->make }} {{ $car->model }}
                    </h1>

                    <div class="text-2xl text-green-600 font-semibold mb-4">
                        € {{ number_format($car->price, 2, ',', '.') }}
                    </div>

                    <div class="space-y-2">
                        <div><strong>Bouwjaar:</strong> {{ $car->production_year }}</div>
                        <div><strong>Kilometerstand:</strong> {{ number_format($car->mileage) }} km</div>
                        <div><strong>Kleur:</strong> {{ $car->color ?? 'Onbekend' }}</div>
                        <div><strong>Gewicht:</strong> {{ $car->weight ?? '-' }} kg</div>
                        <div><strong>Deuren:</strong> {{ $car->doors ?? '-' }}</div>
                        <div><strong>Stoelen:</strong> {{ $car->seats ?? '-' }}</div>
                        <div><strong>Bekeken:</strong> {{ $car->views }}</div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('home') }}" class="text-blue-600 hover:underline">
                            ← Terug naar overzicht
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>