let slider = document.getElementById("myRange");
let output = document.getElementById("demo");
output.innerHTML = slider.value;
let valueOfSlider = 50;
slider.oninput = function () {
    output.innerHTML = this.value;
    valueOfSlider = this.value;
}
let k = 0;

function showAdderOnClick() {
    let card = document.querySelector('.card');
    card.style.display = 'block';
}