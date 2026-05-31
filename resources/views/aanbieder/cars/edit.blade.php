<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

                <div class="edit-layout">

                    <div class="edit-form-side">

                        <div class="edit-grid">
                            <div class="edit-field">
                                <x-input-label for="kenteken" :value="__('Kenteken')" />
                                <x-text-input id="kenteken" class="edit-input" type="text" name="kenteken"
                                    value="{{ old('kenteken', $car->license_plate) }}" required />
                            </div>

                            <div class="edit-field">
                                <x-input-label for="merk" :value="__('Merk')" />
                                <x-text-input id="merk" class="edit-input" type="text" name="merk"
                                    value="{{ old('merk', $car->make) }}" required />
                            </div>
                        </div>

                        <div class="edit-grid">
                            <div class="edit-field">
                                <x-input-label for="model" :value="__('Model')" />
                                <x-text-input id="model" class="edit-input" type="text" name="model"
                                    value="{{ old('model', $car->model) }}" required />
                            </div>

                            <div class="edit-field">
                                <x-input-label for="prijs" :value="__('Prijs')" />
                                <x-text-input id="prijs" class="edit-input" type="number" name="prijs"
                                    value="{{ old('prijs', $car->price) }}" required />
                            </div>
                        </div>

                        <div class="edit-grid">
                            <div class="edit-field">
                                <x-input-label for="kilometerstand" :value="__('Kilometerstand')" />
                                <x-text-input id="kilometerstand" class="edit-input" type="number"
                                    name="kilometerstand"
                                    value="{{ old('kilometerstand', $car->mileage) }}" required />
                            </div>

                            <div class="edit-field">
                                <x-input-label for="kleur" :value="__('Kleur')" />
                                <x-text-input id="kleur" class="edit-input" type="text" name="kleur"
                                    value="{{ old('kleur', $car->color) }}" />
                            </div>
                        </div>

                        <div class="edit-grid">
                            <div class="edit-field">
                                <x-input-label for="stoelen" :value="__('Aantal Stoelen')" />
                                <x-text-input id="stoelen" class="edit-input" type="number" name="stoelen"
                                    value="{{ old('stoelen', $car->seats) }}" />
                            </div>

                            <div class="edit-field">
                                <x-input-label for="deuren" :value="__('Aantal Deuren')" />
                                <x-text-input id="deuren" class="edit-input" type="number" name="deuren"
                                    value="{{ old('deuren', $car->doors) }}" />
                            </div>
                        </div>

                        <div class="edit-grid">
                            <div class="edit-field">
                                <x-input-label for="gewicht" :value="__('Gewicht')" />
                                <x-text-input id="gewicht" class="edit-input" type="number" name="gewicht"
                                    value="{{ old('gewicht', $car->weight) }}" />
                            </div>

                            <div class="edit-field">
                                <x-input-label for="bouwjaar" :value="__('Bouwjaar')" />
                                <x-text-input id="bouwjaar" class="edit-input" type="number"
                                    name="bouwjaar"
                                    value="{{ old('bouwjaar', $car->production_year) }}" required />
                            </div>
                        </div>

                        <div class="mt-4">
                            @foreach($tags as $tag)
                                <label class="tag-checkbox">
                                    <input
                                        type="checkbox"
                                        name="tags[]"
                                        value="{{ $tag->id }}"
                                        @checked($car->tags->contains($tag->id))
                                    >
                                    <span>{{ $tag->name }}</span>
                                </label>
                            @endforeach
                        </div>

                    </div>

                    <div class="edit-image-side">

                        @if($car->image)
                            <img
                                src="{{ Storage::url($car->image) }}"
                                alt="Car Image"
                                class="edit-preview-image"
                            >
                        @endif

                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Nieuwe afbeelding')" />

                            <x-text-input
                                id="image"
                                class="edit-input"
                                type="file"
                                name="image"
                            />

                            <x-input-error
                                :messages="$errors->get('image')"
                                class="mt-2"
                            />
                        </div>

                    </div>

                </div>

                <div class="mt-6 flex gap-4">

                    <a href="{{ route('aanbieder.dashboard') }}" class="edit-button">
                        Terug
                    </a>

                    <button type="submit" class="edit-button">
                        Wijzig Auto
                    </button>

                </div>

            </div>
        </form>
        <div id="floating-image">
    <img src="/img/logo/cd65e5ea-cfc3-411f-9c42-3a2ee1233d7c.png" alt="Edit indicator">
</div>
    </div>
</x-app-layout>