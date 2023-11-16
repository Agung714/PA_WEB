let list = document.querySelectorAll(".navigation li");

function activeLink(){
    list.forEach(item => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

list.forEach(item => item.addEventListener("mouseover", activeLink));

// menu toggle
let toggle = document.querySelector(".toggle");
let navigasi = document.querySelector(".navigasi");
let main = document.querySelector(".main");

toggle.onclick = function (){
    navigasi.classList.toggle("active");
    main.classList.toggle("active");
}