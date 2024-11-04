let slideIndex = 0;
showSlides();

// Volgende/Vorige controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Toon de juiste slide
function showSlides() {
    let slides = document.getElementsByClassName("card fade");

    // Reset slideIndex als hij buiten de grenzen gaat
    if (slideIndex >= slides.length) { slideIndex = 0; }
    if (slideIndex < 0) { slideIndex = slides.length - 1; }

    // Verberg alle slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // Toon de huidige slide
    slides[slideIndex].style.display = "block";

    // Automatisch de slide veranderen
    slideIndex++;
    setTimeout(showSlides, 6000); // Verander slide elke 3 seconden
}
