document.addEventListener("DOMContentLoaded", function () {

    const inputs = document.querySelectorAll(".edit-input");
    const floatingImage = document.getElementById("floating-image");

    inputs.forEach(input => {
        input.addEventListener("focus", function () {

            const rect = input.getBoundingClientRect();

            floatingImage.style.left = rect.left + rect.width / 2 - 25 + "px";
            floatingImage.style.top = rect.top + window.scrollY - 60 + "px";

            floatingImage.classList.add("show");
        });
    });

});