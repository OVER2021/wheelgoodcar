<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                aanbieder pagina
            </h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded font-semibold transition">
                    Uitloggen
                </button>
            </form>
        </div>
        <a href="{{ route('cars.create') }}"
           class="bg-yellow-400 hover:bg-yellow-500 px-6 py-3 rounded font-bold inline-block">
            Auto toevoegen
        </a>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                Welkom {{ auth()->user()->name }}<br>
                <div class="bg-white rounded p-6">
                    <h3 class="text-lg font-semibold mb-4">Mijn auto’s</h3>

                    @if(auth()->user()->cars->count())
                        <table class="min-w-full border">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-2 text-left">Merk</th>
                                    <th class="p-2 text-left">Model</th>
                                    <th class="p-2 text-left">Prijs</th>
                                    <th class="p-2 text-left">Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(auth()->user()->cars as $car)
                                    <tr class="border-t">
                                        <td class="p-2">{{ $car->merk }}</td>
                                        <td class="p-2">{{ $car->model }}</td>
                                        <td class="p-2">€ {{ number_format($car->prijs) }}</td>
                                        <td class="p-2">
                                            <a href="{{ route('cars.edit', $car) }}" class="text-blue-600 hover:underline">
                                                Bewerken
                                            </a> | 
                                            <form method="POST"
                                                  action="{{ route('cars.destroy', $car) }}"
                                                  onsubmit="return confirm('Weet je zeker?')"
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:underline">
                                                    Verwijder
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-500">
                            Je hebt nog geen auto’s geplaatst.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>