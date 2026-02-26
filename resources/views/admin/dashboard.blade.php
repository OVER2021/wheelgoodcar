<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Beheerder Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    🛠️ Welkom beheerder <strong>{{ auth()->user()->name }}</strong>
                    <hr class="my-4">

                    <ul class="list-disc ml-6">
                        <li>Gebruikers beheren</li>
                        <li>Rollen aanpassen</li>
                        <li>Producten modereren</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

        <!-----------Uitlog functie-------------->
        @auth
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="underline text-red-600 hover:text-red-800">
            Uitloggen
        </button>
        </form>
        @endauth
    <!-----------Uitlog functie-------------->

</x-app-layout>
