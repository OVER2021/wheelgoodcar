<x-app-layout>

<div class="all-cars-page all-cars">

    <div class="all-cars-bg"></div>

    <div class="bottom-left">
        <a href="{{ route('home') }}" class="back-button">← Terug</a>
    </div>

    <div 
    class="all-cars-container"
    id="allCarsApp"
    data-cars='@json($cars)'
    data-current="{{ $current ?? '' }}"
>

        <button id="prevCar" class="arrow left">‹</button>
        <button id="nextCar" class="arrow right">›</button>

        <div class="car-info" id="carInfo">

        </div>

        <div class="car-image-wrapper">
            <img id="carImage">
        </div>

        <img id="cornerLogo" src="{{ asset('img/logo/rL5qB.png') }}" class="corner-image">

    </div>

</div>

</div>

@vite('resources/js/all-cars.js')

</x-app-layout>