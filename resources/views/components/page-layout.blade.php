<div class="min-h-screen bg-cover bg-center"
     style="background-image: url('{{ asset('images/background.jpg') }}');">

    {{-- Header --}}
    <header class="h-[80px] flex items-center px-6 bg-black/50 text-white">
        {{ $header }}
    </header>

    {{-- Body --}}
    <main class="min-h-[calc(100vh-80px)] px-6 py-6">
        {{ $slot }}
    </main>

</div>
