document.addEventListener("DOMContentLoaded", init);

var tempsRestant = 60;

function init(evt) {
    //Ajouter un écouteur qui vérifie si on presse une touche
    document.getElementById("saisieUser").addEventListener("keyup", testEnter);

    //Toutes les 1 sec, on appelle la fonction timer
    window.setInterval(timer, 1000);
}

//Cette fonction permet d'attendre n millisecondes
function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

//Cette fonction teste si la touche actuellement pressée est entrée
function testEnter(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("envoyerReponse").click();
    }
}

//Cette fonction s'active lorsqu'on appuie sur entrée. La valeur saisie est stockée,
//et la valeur du champ effacée.
function buttonCode() {
    var saisieUtilisateur = document.getElementById('saisieUser').value;
    document.getElementById("saisieUser").value = "";
}

//Cette fonction met à jour la variable globale tempsRestant et affiche le timer
function timer() {

    //On met le temps restant sous forme de XX:XX
    document.getElementById("timer").textContent = stringTemps(tempsRestant);

    //Si il n'y a plus de temps
    if (tempsRestant == 0) {


        //Cette ligne empêche que le timer descende en dessous de 0, par soucis esthétique
        tempsRestant++;
    }

    //On retire une seconde au timer chaque seconde
    tempsRestant = tempsRestant - 1;

}

//Cette fonction permet de mettre en forme un entier en secondes (ex : 60), sous la forme d'un timer (ex : 1:00)
function stringTemps(temps) {
    return Math.floor(temps / 60) + ":" + temps % 60;
}

/////////////////////////////////////////////////////////////////
//FONCTION D'ADAPTATION AUTO DU TEXTE A LA DIV
////////////////////////////////////////////////////////////////

