let page = document.querySelectorAll('.page');
let slider = document.getElementById("myRange");
let output = document.getElementById("demo");
output.style.color = "black";

page.forEach(element => {
    element.addEventListener('click', ()=>{
        page.forEach(unit => {
            unit.classList.remove('active');
        });        
        element.classList.add('active');
    })
});

output.innerHTML = slider.value.concat(' ', ' € max.'); // Display the default slider value
slider.oninput = function() {
  output.innerHTML = this.value.concat(' ', ' € max.');
}

