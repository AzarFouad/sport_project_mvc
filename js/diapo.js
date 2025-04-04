// Variable globale
let compteur = 0;
let timer, elements, slides, slidewidth;

window.onload = () => {
    const diapo = document.querySelector(".diapo");
    elements = document.querySelector(".elements");
    slides = Array.from(elements.children);
    // On calcule la longueur du diaporama
    slidewidth = diapo.getBoundingClientRect().width;
    let next = document.querySelector("#nav-droite");
    next.addEventListener("click", slideNext);
    let prev = document.querySelector("#nav-gauche"); // Correction ici
    prev.addEventListener("click", slidePrev);
    // Automatiser le diaporama
    timer = setInterval(slideNext, 4000);
    // Gérer le survol de la souris
    diapo.addEventListener("mouseover", stopTimer);
    diapo.addEventListener("mouseout", startTimer);
};

// Cette fonction défile le diaporama vers la droite
function slideNext() {
    compteur++;
    if (compteur == slides.length) {
        compteur = 0;
    }
    let decal = -slidewidth * compteur;
    elements.style.transform = `translateX(${decal}px)`;
}

// Mise en œuvre du "responsive"
window.addEventListener("resize", () => {
    slidewidth = diapo.getBoundingClientRect().width;
    slideNext();
});

// Cette fonction défile le diaporama vers la gauche
function slidePrev() {
    // On décrémente le compteur
    compteur--;
    // Si on dépasse le début du diaporama, on repart à la fin
    if (compteur < 0) {
        compteur = slides.length - 1;
    }
    // On calcule la valeur du décalage
    let decal = -slidewidth * compteur;
    elements.style.transform = `translateX(${decal}px)`;
}

// On stoppe le défilement
function stopTimer() {
    clearInterval(timer);
}

// On redémarre le défilement
function startTimer() {
    timer = setInterval(slideNext, 4000);
}
