(function () {
    "use strict";
    $(document).ready(initialiser);

    function initialiser(evt) {

        var revanche = $("#revanche");
        var rejouer = $("#revanche");
        var quitter = $("#revanche");

        quitter.click(validationBouton);

    }


function validationBouton() {

    if (confirm("Êtes-vous sûr de vouloir continuer")) {
        document.location.href="https://projets.iut-laval.univ-lemans.fr/17mmi1pj10/";
    } else {
        
    }
    
}



}());