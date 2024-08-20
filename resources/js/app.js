import "./bootstrap";
import "../css/app.css";
import.meta.glot(["../images/**"]);
document.getElementById("user-menu").addEventListener("click", function () {
    document.getElementById("dropdown").classList.toggle("hidden");
});

// Toggle mobile menu
document
    .getElementById("mobile-menu-button")
    .addEventListener("click", function () {
        document.getElementById("mobile-menu").classList.toggle("hidden");
    });

// Toggle mobile user dropdown
document
    .getElementById("mobile-user-menu")
    .addEventListener("click", function () {
        document.getElementById("mobile-dropdown").classList.toggle("hidden");
    });
