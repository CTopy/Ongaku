document.addEventListener("DOMContentLoaded",initialiser);

function initialiser(evt) {
    var disque = document.querySelector("h1::before");
    console.log(disque);
     disque.addEventListener("mouseenter",tournerDisque);
     disque.addEventListener("mouseleave",arreterDisque);
}

function tournerDisque(evt){
    this.classList.add("animation");
    
}


function arreterDisque(evt){
    this.classList.remove("animation");
    
}