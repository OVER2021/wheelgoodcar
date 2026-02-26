<x-guest-layout>
    <div class="rounded-2xl p-8 bg-white">
        <h1 class="text-3xl font-semibold text-center mb-6">Registreren</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="name" value="Naam" />
                <x-text-input id="name" name="name" type="text" class="w-full" required />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="mb-4">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" name="email" type="email" class="w-full" required />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <div class="mb-4">
                <x-input-label for="password" value="Wachtwoord" />
                <x-text-input id="password" name="password" type="password" class="w-full" required />
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div class="mb-6">
                <x-input-label for="password_confirmation" value="Bevestig wachtwoord" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="w-full" required />
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('login') }}" class="underline">Al een account?</a>
                <x-primary-button>Registreren</x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
