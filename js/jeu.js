(function () {
"use strict";

//    Déclaration des variables utilisateur
//    *
        var tempsRestant = 45,
        IdMusique,
        NomMusique,
        NomAuteur,
        TexteATrous,
        IdParoles,
        points = 0,
        nbMusiques = 0,

        //Variable globale qui servira à récupérer les données PHP
        donneesPHP;
    
    // *************************
    // Fonction d'initialisation
    // *************************
    function init(evt) {
        
        verifierFin(10);
        
        //Quand on clique sur le bouton
        $("#envoyerReponse").click(buttonCode);

        //Quand on valide le formulaire
        $("#formulaire").submit(function () {
            return false;
        });

        //Toutes les 1 sec, on appelle la fonction timer
        window.setInterval(timer, 1000);

        requeteMusique();
    }
    document.addEventListener("DOMContentLoaded", init);

    //****************************************************************************************************
    // Cette fonction demande une musique à la page PHP, affiche, puis stocke les informations nécessaires
    //****************************************************************************************************
    function requeteMusique() {
        var donneesPHPloc,
            //
            // Envoyer une requête SQL à PHP pour demander une musique + paroles etc.
            oReq = new XMLHttpRequest(); //New request object
        oReq.onload = function () {
            //This is where you handle what to do with the response.
            //The actual data is found on this.responseText

            //Tableau :
            //0 : IdMusique
            //1 : TitreMusique
            //2 : NomAuteur
            //Vérification faite sur la page PHP
            //4 : Phrase
            //5 : IdParoles
            donneesPHPloc = this.responseText.split([";"]);

            //Préparer variable
            var lienIframe = "https://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=false&width=300&height=300&color=007FEB&layout=dark&size=medium&type=tracks&id=" +
                donneesPHPloc[0] + "&app_id=1";

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
    }

    //*****************************************************************
    //Cette fonction teste si la touche actuellement pressée est entrée
    //*****************************************************************
    function testEnter(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
            document.getElementById("envoyerReponse").click();
        }
    }

    //**********************************************************************************
    //Cette fonction s'active lorsqu'on appuie sur entrée. La valeur saisie est stockée,
    //et la valeur du champ effacée.
    //*******************************
    function buttonCode(e) {

        e.preventDefault();
        var saisieUtilisateur = $('#saisieUser').val();
        document.getElementById("saisieUser").value = "";

        $.ajax({
            type: 'post',
            url: 'jeu_process.php',
            data: {
                saisieUser: saisieUtilisateur,
                phrase: donneesPHP[4],
                idParoles: donneesPHP[5],
                motsCaches: donneesPHP[3],
            },
            success: function (data) {
                //Récupérer les données traitées par PHP
                var donneesPHPloc = data.split([";"]);
                //0 : Booléen indiquant la victoire ou non
                //1 : Phrase completée

                $("#paroles").text(donneesPHPloc[1]);

                if (donneesPHPloc[0] == "true") {
                    // Si le joueur a gagné


                    window.setTimeout(function () {
                        //Au bout de 300 ms on ajoute un point, on change de musique (envoi de requête AJAX vide), on reset le timer
                        points++;
                        nbMusiques++;
                        tempsRestant = 45;
                        requeteMusique();

                    }, 300);
                }
            }
        });

        return false;
    }

    //******************************************************************************
    //Cette fonction met à jour la variable globale tempsRestant et affiche le timer
    //******************************************************************************
    function timer() {

        //On met le temps restant sous forme de XX:XX
        document.getElementById("timer").textContent = stringTemps(tempsRestant);

        //Si il n'y a plus de temps
        if (tempsRestant == 0) {

            //Cette ligne empêche que le timer descende en dessous de 0, par soucis esthétique
            tempsRestant++;

            //L'utilisateur a perdu
            nbMusiques++;
            tempsRestant = 45;
            requeteMusique();
        }

        //On retire une seconde au timer chaque seconde
        tempsRestant = tempsRestant - 1;

    }

    //*************************************************************************************************************
    //Cette fonction permet de mettre en forme un entier en secondes (ex : 60), sous la forme d'un timer (ex : 1:00)
    //*************************************************************************************************************
    function stringTemps(temps) {
        return Math.floor(temps / 60) + ":" + temps % 60;
    }

    //***************************************************************************
    // Cette fonction vérifie si la partie doit se terminer, et si oui la termine
    // nbM : nombre de musiques passées
    //***************************************************************************
    function verifierFin(nbM) {
        if (nbM == 10) {
            document.getElementsByTagName("main")[0].insertAdjacentHTML("afterend", 
                                                                        "<form action=\"pagetest.php\" method=\"post\"><input type=\"hidden\" name=\"score\" value=\""+points+"\" /></form>");
        }
    }
    
})();