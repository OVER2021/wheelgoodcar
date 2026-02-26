<x-guest-layout>
    <div class="rounded-2xl p-8 bg-white">
        <h1 class="text-3xl font-semibold text-center mb-6">Inloggen</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" name="email" type="email" class="w-full" required autofocus />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <div class="mb-4">
                <x-input-label for="password" value="Wachtwoord" />
                <x-text-input id="password" name="password" type="password" class="w-full" required />
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('register') }}" class="underline">Registreren</a>
                <x-primary-button>Login</x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
