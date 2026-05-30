document.addEventListener('DOMContentLoaded', () => {

    const app = document.getElementById('allCarsApp');

    const cars = JSON.parse(app.dataset.cars);
    const currentId = app.dataset.current;

    let index = 0;
    let isLoading = false;

    const image = document.getElementById('carImage');
    const info = document.getElementById('carInfo');
    const cornerLogo = document.getElementById('cornerLogo');

    if (currentId) {
        const foundIndex = cars.findIndex(c => c.id == currentId);
        if (foundIndex !== -1) {
            index = foundIndex;
        }
    }

    function renderCar(car) {
        image.src = car.image ? '/storage/' + car.image : '/img/cars/default.jpg';

        const tagsHtml = car.tags
        ? car.tags.map(tag => `
            <span class="car-tag">
                ${tag.name}
            </span>
        `).join('')
        : '';

        info.innerHTML = `
            <h1>${car.make} ${car.model}</h1>
            <p>Prijs: €${car.price}</p>
            <p>Kilometerstand: ${car.mileage} km</p>
            <p>Bouwjaar: ${car.production_year ?? '-'}</p>
            <p>Kleur: ${car.color ?? '-'}</p>
            <p>Gewicht: ${car.weight ?? '-'}</p>
            <p>Deuren: ${car.doors ?? '-'}</p>
            <p>Stoelen: ${car.seats ?? '-'}</p>
            <p>Kenteken: ${car.license_plate}</p>
            <div class="car-tags">
            ${tagsHtml}
        </div>

        ${car.sold_at ? `<div class="sold-bar">VERKOCHT</div>` : ''}

        `;
    }

    window.goToCar = function(id) {
        if (isLoading) return;
        isLoading = true;

        cornerLogo.src = '/img/logo/snoopdoggblij.png?v=' + Date.now();
        cornerLogo.classList.add('loading');

        setTimeout(() => {
            window.location.href = `/cars/${id}?from=all&current=${id}`;
        }, 350);
    }

    function changeCar(direction) {
        if (isLoading) return;

        image.classList.remove('slide-in-left', 'slide-in-right');
        image.classList.add(direction === 'next' ? 'slide-out-left' : 'slide-out-right');

        setTimeout(() => {

            if (direction === 'next') {
                index = (index + 1) % cars.length;
            } else {
                index = (index - 1 + cars.length) % cars.length;
            }

            renderCar(cars[index]);

            image.classList.remove('slide-out-left', 'slide-out-right');
            image.classList.add(direction === 'next' ? 'slide-in-right' : 'slide-in-left');

        }, 300);
    }

    document.getElementById('nextCar').onclick = () => changeCar('next');
    document.getElementById('prevCar').onclick = () => changeCar('prev');

    window.addEventListener('pageshow', () => {
        isLoading = false;
        cornerLogo.classList.remove('loading');
        cornerLogo.src = '/img/logo/rL5qB.png';
    });

    renderCar(cars[index]);

});