import './bootstrap';

import Alpine from 'alpinejs';
import.meta.glob([
    '../Assets/',
  ]);
window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function() {
    const dropdownButton = document.getElementById("dropdownMenuButton");
    const dropdownMenu = document.querySelector(".dropdown-menu");

    dropdownButton.addEventListener("click", function() {
        dropdownMenu.classList.toggle("show");
    });

    document.addEventListener("click", function(event) {
        if (!event.target.matches(".dropdown-button")) {
            dropdownMenu.classList.add("show");
        }
    });
});

