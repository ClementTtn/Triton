document.addEventListener('DOMContentLoaded', init,false);
console.log("Lancement du programme 'main.js'")

function init(){
    // Initialisation du bouton de l'ouverture du menu.
    document.getElementById('ouverture_menu').addEventListener("click", ouverture);

    // Initialisation du bouton de la fermeture du menu.
    document.getElementById('fermeture_menu').addEventListener("click", ouverture);
}


// Ouvre le menu ou le ferme.
function ouverture(){
    // On vérifie s'il y a bien un id "fermé" dans le HTML.
    if (document.querySelectorAll("#fermé").length > 0){

        // On change l'id par "ouvert" en cherchant l'id via la classe "menu".
        document.getElementsByClassName("menu")[0].id = "ouvert";
        console.log("Ouverture du menu.");
    }

    else{
        // Si le menu n'est pas fermé, alors il est ouvert.
        document.getElementsByClassName("menu")[0].id = "fermé";

        // On change l'id par "fermé" en cherchant l'id via la classe "menu".
        console.log("Fermeture du menu.");
    }
}