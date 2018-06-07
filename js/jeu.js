(function() {
//    Fonction anonyme
"use strict";
document.addEventListener("DOMContentLoaded", init);

var tempsRestant = 60;
var IdMusique, NomMusique, NomAuteur, TexteATrous, IdParoles;

function reqListener() {
    console.log(this.responseText);
}

//Variable globale qui servira à récupérer les données PHP
var donneesPHP;

function init(evt) {

    //
    //On envoie une requête HTTP à l'aide d'AJAX à la page jeu_process.php
    //
    //
    $.ajax({
        type: "POST",
        url: "jeu_process.php",
        data: {}, // the param to send to your file, 
        success: function (msg) {; // msg is the result of your 'myfile.php', everything you write is in the msg var

        }
    });

    var donneesPHPloc;
    
    //
    //Récupérer les données de la page PHP
    //
    //
    var oReq = new XMLHttpRequest(); //New request object
    oReq.onload = function () {
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
        
        //Tableau :
        //0 : IdMusique
        //1 : TitreMusique
        //2 : NomAuteur
        //3 : MotsCaches -> devront être absents dans la version finale
        //Vérification faite sur la page PHP
        //4 : Phrase
        //5 : IdParoles
        donneesPHPloc = this.responseText.split([";"]);
        var motsCaches = donneesPHPloc[3].split(["/"]);
        
        //Préparer variable
        var lienIframe = "https://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=false&width=300&height=300&color=007FEB&layout=dark&size=medium&type=tracks&id="+
            donneesPHPloc[0];
            +"&app_id=1"
        
        //Afficher
        document.getElementById("titre").textContent = donneesPHPloc[1];
        document.getElementById("auteur").textContent = donneesPHPloc[2];
        document.getElementById("paroles").textContent = donneesPHPloc[4];
        document.getElementsByTagName("iframe")[0].setAttribute("src", lienIframe);
        
        //Récupérer les données PHP dans la variable globale
        donneesPHP = donneesPHPloc;
    };
    oReq.open("post", "jeu_process.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to 
    //                                 continue.
    oReq.send();

    //Ajouter un écouteur qui vérifie si on presse une touche
    document.getElementById("saisieUser").addEventListener("keyup", testEnter);

    //Toutes les 1 sec, on appelle la fonction timer
    window.setInterval(timer, 1000);
}

//
//Cette fonction permet d'attendre n millisecondes
//
function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

//
//Cette fonction teste si la touche actuellement pressée est entrée
//
function testEnter(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("envoyerReponse").click();
    }
}

//
//Cette fonction s'active lorsqu'on appuie sur entrée. La valeur saisie est stockée,
//et la valeur du champ effacée.
//
function buttonCode() {
    var saisieUtilisateur = $('#saisieUser').val();
    document.getElementById("saisieUser").value = "";

    $.ajax({
        type: "POST",
        url: "jeu_process.php",
        data: {
            saisieUser: saisieUtilisateur,
            phrase : donneesPHP[4],
            IdParoles : donneesPHP[5],
            
        }, // the param to send to your file, 
        success: function (msg) {; // msg is the result of your 'myfile.php', everything you write is in the msg var
        }
    });
    return false;
}

//
//Cette fonction met à jour la variable globale tempsRestant et affiche le timer
//
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

//
//Cette fonction permet de mettre en forme un entier en secondes (ex : 60), sous la forme d'un timer (ex : 1:00)
//
function stringTemps(temps) {
    return Math.floor(temps / 60) + ":" + temps % 60;
}}());