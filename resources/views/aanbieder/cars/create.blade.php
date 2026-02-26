<x-app-layout>
    <form method="POST" action="{{ route('cars.check') }}" class="flex flex-col items-center mt-20 gap-6">
        @csrf

        <div class="license-plate">
            <div class="license-nl">NL</div>

            <input
                type="text"
                name="kenteken"
                placeholder="AA-BB-12"
                class="license-input"
                required
            >

            <button type="submit" class="license-icon">
                <img src="/img/logo/WheelGoodCarsLogo (1).png" alt="Verder">
            </button>
        </div>

        <button type="submit" class="create-plate-button">
            Kentekenplaat aanmaken              
        </button>
    </form>
</x-app-layout>
