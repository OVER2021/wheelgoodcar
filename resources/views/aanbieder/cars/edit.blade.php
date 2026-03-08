<x-app-layout>
    <div class="edit-car-wrapper">
        <div class="edit-car-header">
            <h2 class="edit-car-title">
                Auto Bewerken
            </h2>
            <a href="{{ route('aanbieder.dashboard') }}" class="text-gray-600 hover:text-gray-800">Terug naar dashboard</a>
        </div>

        <form method="POST" action="{{ route('cars.update', $car) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="edit-car-card">
                <h3 class="text-lg font-semibold mb-4">Bewerk Auto</h3>

                <div class="edit-grid">
                    <div class="edit-grid">
                        <div class="edit-field">
                            <x-input-label for="kenteken" :value="__('Kenteken')" />
                            <x-text-input id="kenteken" class="edit-input" type="text" name="kenteken" value="{{ old('kenteken', $car->license_plate) }}" required />
                            <x-input-error :messages="$errors->get('kenteken')" class="mt-2" />
                        </div>
                        <div class="edit-field">
                            <x-input-label for="merk" :value="__('Merk')" />
                            <x-text-input id="merk" class="edit-input" type="text" name="merk" value="{{ old('merk', $car->make) }}" required />
                            <x-input-error :messages="$errors->get('merk')" class="mt-2" />
                        </div>
                    </div>

                    <div class="edit-grid">
                        <div class="edit-field">
                            <x-input-label for="model" :value="__('Model')" />
                            <x-text-input id="model" class="edit-input" type="text" name="model" value="{{ old('model', $car->model) }}" required />
                            <x-input-error :messages="$errors->get('model')" class="mt-2" />
                        </div>
                        <div class="edit-field">
                            <x-input-label for="prijs" :value="__('Prijs')" />
                            <x-text-input id="prijs" class="edit-input" type="number" name="prijs" value="{{ old('prijs', $car->price) }}" required />
                            <x-input-error :messages="$errors->get('prijs')" class="mt-2" />
                        </div>
                    </div>

                    <div class="edit-grid">
                        <div class="edit-field">
                            <x-input-label for="kilometerstand" :value="__('Kilometerstand')" />
                            <x-text-input id="kilometerstand" class="edit-input" type="number" name="kilometerstand" value="{{ old('kilometerstand', $car->mileage) }}" required />
                            <x-input-error :messages="$errors->get('kilometerstand')" class="mt-2" />
                        </div>
                        <div class="edit-field">
                            <x-input-label for="kleur" :value="__('Kleur')" />
                            <x-text-input id="kleur" class="edit-input" type="text" name="kleur" value="{{ old('kleur', $car->color) }}" />
                                                        <x-input-error :messages="$errors->get('kleur')" class="mt-2" />
                        </div>
                    </div>

                    <div class="edit-grid">
                        <div class="edit-field">
                            <x-input-label for="stoelen" :value="__('Aantal Stoelen')" />
                            <x-text-input id="stoelen" class="edit-input" type="number" name="stoelen" value="{{ old('stoelen', $car->seats) }}" />
                            <x-input-error :messages="$errors->get('stoelen')" class="mt-2" />
                        </div>
                        <div class="edit-field">
                            <x-input-label for="deuren" :value="__('Aantal Deuren')" />
                            <x-text-input id="deuren" class="edit-input" type="number" name="deuren" value="{{ old('deuren', $car->doors) }}" />
                            <x-input-error :messages="$errors->get('deuren')" class="mt-2" />
                        </div>
                    </div>

                    <div class="edit-grid">
                        <div class="edit-field">
                            <x-input-label for="gewicht" :value="__('Gewicht')" />
                            <x-text-input id="gewicht" class="edit-input" type="number" name="gewicht" value="{{ old('gewicht', $car->weight) }}" />
                            <x-input-error :messages="$errors->get('gewicht')" class="mt-2" />
                        </div>
                        <div class="edit-field">
                            <x-input-label for="bouwjaar" :value="__('Bouwjaar')" />
                            <x-text-input id="bouwjaar" class="edit-input" type="number" name="bouwjaar" value="{{ old('bouwjaar', $car->production_year) }}" required />
                            <x-input-error :messages="$errors->get('bouwjaar')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="image" :value="__('Afbeelding')" />
                        <x-text-input id="image" class="edit-input" type="file" name="image" />
                        @if($car->image)
                            <div class="mt-2">
                                <img src="{{ Storage::url($car->image) }}" alt="Car Image" class="max-w-xs">
                            </div>
                        @endif
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex gap-4">

                    <a href="{{ route('aanbieder.dashboard') }}" class="edit-button">
                        Terug
                    </a>

                    <button class="edit-button">
                        Wijzig Auto
                    </button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>