<x-app-layout>

<div
    class="relative min-h-screen overflow-hidden"
    x-data="{ show: false }"
    x-init="setTimeout(() => show = true, 5000)"
>

    <div class="fixed top-0 left-0 w-full z-50 bg-white">
        <div class="progress-wrapper">
            <div class="progress-bar" style="width:100%">
                Stap 2 van 2
            </div>
        </div>
    </div>

    <video autoplay muted playsinline
           class="absolute inset-0 w-full h-full object-cover object-[center_35%] z-0"
        <source src="{{ asset('videos/cardealer.mp4') }}" type="video/mp4">
    </video>

    <div class="absolute inset-0 transition-all duration-700"
         :class="show ? 'bg-black/70' : 'bg-black/0'">
    </div>

    <a href="{{ route('dashboard') }}"
       class="fixed top-4 left-4 text-white z-50">
        ←
    </a>

    <div class="relative z-10 flex items-center justify-center min-h-screen pt-20">

        <form
            x-show="show"
            x-transition
            method="POST"
            action="{{ route('cars.store') }}"
            enctype="multipart/form-data"
            class="w-full max-w-xl bg-white p-10 rounded-2xl space-y-6"
        >
            @csrf

            @foreach($tags as $tag)
                <input type="hidden" name="tags[]" value="{{ $tag }}">
            @endforeach

            <h1 class="text-3xl font-bold text-center">
                Auto plaatsen
            </h1>

                <input type="hidden" name="kenteken" value="{{ $kenteken }}">

                <div>
                    <label class="block mb-2 font-semibold">Merk</label>
                    <input type="text"
                           name="merk"
                           value="{{ $data['merk'] ?? '' }}"
                           class="w-full p-4 text-lg border rounded-lg"
                           required>
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Model</label>
                    <input type="text"
                           name="model"
                           value="{{ $data['handelsbenaming'] ?? '' }}"
                           class="w-full p-4 text-lg border rounded-lg"
                           required>
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Bouwjaar</label>
                    <input type="number"
                           name="bouwjaar"
                           value="{{ $bouwjaar ?? '' }}"
                           class="w-full p-4 text-lg border rounded-lg"
                           required>
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Prijs (€)</label>
                    <input type="number"
                           name="prijs"
                           class="w-full p-4 text-lg border rounded-lg"
                           required>
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Kilometerstand (km)</label>
                    <input type="number"
                           name="kilometerstand"
                           class="w-full p-4 text-lg border rounded-lg"
                           required>
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Aantal stoelen</label>
                    <input type="number"
                           name="stoelen"
                           value="{{ $stoelen ?? '' }}"
                           class="w-full p-4 text-lg border rounded-lg">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Aantal deuren</label>
                    <input type="number"
                           name="deuren"
                           value="{{ $deuren ?? '' }}"
                           class="w-full p-4 text-lg border rounded-lg">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Gewicht (kg)</label>
                    <input type="number"
                           name="gewicht"
                           value="{{ $gewicht ?? '' }}"
                           class="w-full p-4 text-lg border rounded-lg">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Kleur</label>
                    <input type="text"
                           name="kleur"
                           value="{{ $kleur ?? '' }}"
                           class="w-full p-4 text-lg border rounded-lg">
                </div>

                <div>
                    <label class="block mb-2 font-semibold">Auto afbeelding</label>
                    <input type="file"
                           name="image"
                           class="w-full p-4 text-lg border rounded-lg">
                </div>

                <button type="submit"
                        class="w-full bg-yellow-400 py-4 text-lg rounded-xl font-bold hover:bg-yellow-500">
                    Auto plaatsen
                </button>

            </form>
        </div>
    </div>
</x-app-layout>