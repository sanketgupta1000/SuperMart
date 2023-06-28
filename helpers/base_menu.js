let menu = document.getElementById("menu");

function toggleMenu() {
    // console.log("Hello");
    let nav = document.querySelector("nav");
    if (nav.style.display == "block") {
        nav.style.display = "none";
    }
    else {
        nav.style.display = "block";
    }
}
menu.addEventListener("click", toggleMenu);
