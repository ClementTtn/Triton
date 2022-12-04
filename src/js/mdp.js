document.addEventListener('DOMContentLoaded', init,false);
console.log("Lancement du programme 'mdp.js'.")

// Sélection du bouton pour cacher le mot de passe.
const cache = document.querySelector(".cache");

// Sélection du bouton pour rendre visible le mot de passe.
const visible = document.querySelector(".visible");

// Sélection de la sélection de l'input du formulaire pour savoir quoi cacher (ici le mot de passe).
const inputMdP = document.querySelector("input[type=password]");

// Fonction qui initialise l'action pour cacher ou rendre visible
function init(){
    // Au click, mot de passe affiché.
    cache.addEventListener("click", () => {
        cache.style.display = "none";
        visible.style.display = "inline";
        inputMdP.type = "text";
        console.log("Mot de passe affiché.")
    });

    // Au click, mot de passe caché.
    visible.addEventListener("click", () => {
        visible.style.display = "none";
        cache.style.display = "inline";
        inputMdP.type = "password";
        console.log("Mot de passe caché.")
    });
}
