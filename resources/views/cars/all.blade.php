<x-app-layout>

<div class="all-cars-page all-cars">

    <div class="all-cars-bg"></div>

    <div class="bottom-left">
        <a href="{{ route('home') }}" class="back-button">← Terug</a>
    </div>

    <div 
    class="all-cars-container"
    id="allCarsApp"
    data-cars='@json($cars->values())'
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

<div class="mt-6">
    {{ $cars->links() }}
</div>

<div class="mt-6">
    {{ $cars->links() }}
</div>

<div id="viewToast" class="toast-message">
    <div class="toast-icon">
        <img src="{{ asset('img/logo/BuurvrouwAnnie.png') }}" alt="icon">
    </div>

    <div class="toast-text">
        <strong>Buurvrouw Annie: Heeft onlangs naar deze auto gekeken</strong>
    </div>
</div>

<!-------Zelf gemaakte javascript 😏---------->
<script>
setTimeout(() => {
    const toast = document.getElementById('viewToast');
    toast.classList.add('show');
    setTimeout(() => {
        toast.classList.remove('show');
    }, 10000);

}, 10000);
</script>

@vite('resources/js/all-cars.js')

</x-app-layout>