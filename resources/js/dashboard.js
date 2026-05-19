window.toggleSold = async function(carId)
{
    const response = await fetch(`/cars/${carId}/toggle-sold`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content'),

            'Accept': 'application/json',
        }
    });

    const data = await response.json();

    const status = document.getElementById(`status-${carId}`);
    const button = document.getElementById(`button-${carId}`);

    if(data.sold) {

        status.innerHTML = `
            Status:
            <span style="color:red">
                Verkocht
            </span>
        `;

        button.innerHTML = 'Te koop';

    } else {

        status.innerHTML = `
            Status:
            <span style="color:green">
                Te koop
            </span>
        `;

        button.innerHTML = 'Verkocht';
    }
}