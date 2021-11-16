var canvas = document.getElementById("pizarra");
var context = canvas.getContext("2d");
var boundings = canvas.getBoundingClientRect();
var mouseX = 0;
var mouseY = 0;
context.strokeStyle = 'black'; 
context.lineWidth = 5; 
var isDrawing = false;
  
    // Mouse Down Event
canvas.addEventListener('mousedown', function(event) {
    boundings = canvas.getBoundingClientRect();
    setMouseCoordinates(event);
    isDrawing = true;
    context.beginPath();
    context.moveTo(mouseX, mouseY);
});
  
    // Mouse Move Event
canvas.addEventListener('mousemove', function(event) {
    setMouseCoordinates(event);
    
    if(isDrawing){
        context.lineTo(mouseX, mouseY);
        context.stroke();
    }
});
  
    // Mouse Up Event
canvas.addEventListener('mouseup', function(event) {
    setMouseCoordinates(event);
    isDrawing = false;
});
  
    // Handle Mouse Coordinates
function setMouseCoordinates(event) {
    mouseX = event.clientX - boundings.left;
    mouseY = event.clientY - boundings.top;
}

// Mouse Down Event
canvas.addEventListener('touchstart', function(event) {
    boundings = canvas.getBoundingClientRect();
    setTouchCoordinates(event);
    isDrawing = true;
    context.beginPath();
    context.moveTo(mouseX, mouseY);
});

    // Mouse Move Event
canvas.addEventListener('touchmove', function(event) {
    setTouchCoordinates(event);
    if(isDrawing){
        context.lineTo(mouseX, mouseY);
        context.stroke();
    }
});
      
function setTouchCoordinates(event) {
    mouseX = event.touches[0].clientX - boundings.left;
    mouseY = event.touches[0].clientY - boundings.top;
}

let colores = document.querySelectorAll('.contenedor ul li a');
for (var i = 0; i < colores.length; i++) {
    colores[i].addEventListener('click', function(){
        try {
            document.getElementsByClassName("active")[0].classList.remove("active"); 
        } catch (error) {
            console.error(error);
        }
        this.firstChild.classList.add("active");
        context.strokeStyle = this.getAttribute("style").split(":")[1];
    });
}
  

document.getElementById("refrescar").addEventListener("click", function(){
    context.clearRect(0, 0, canvas.width, canvas.height)
});
  