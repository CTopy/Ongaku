(function () {
    "use strict";
    $(document).ready(initialiser);

    function initialiser() {

        var rejouer = $("#rejouer");
        var quitter = $("#quitter");

        rejouer.click(validationBoutonRejouer);
        quitter.click(validationBoutonQuitter);

        $('#barre').progressbar({
            value: 0
        });

        $("#barre > div").css({
            'background': 'green'
        });

        setTimeout(rafraichir, 50);
    }


    function validationBoutonRejouer(evt) {

        console.log("je suis chargé");

        if (confirm("Êtes-vous sûr de vouloir rejouer")) {
            document.location.href = "https://projets.iut-laval.univ-lemans.fr/17mmi1pj10/jeu.php";
        }

    }


    function validationBoutonQuitter(evt) {

        if (confirm("Êtes-vous sûr de vouloir quitter")) {
            document.location.href = "https://projets.iut-laval.univ-lemans.fr/17mmi1pj10/";
        } else {

        }

    }



    function rafraichir() {
        var progress = $('#barre').progressbar('option', 'value'); // 
        var scoreJoueur = $(".scoreJoueur");
        var score = scoreJoueur.data("score")

        if (progress < score*10) {
            $('#barre').progressbar('option', 'value', progress + 1); // on incrémente la valeur de 1 si elle est strictement inférieure à 100
            setTimeout(rafraichir, 70); // puis on relance la fonction
        }

        if (progress < 10) {
            $("#barre > div").css({
                "background-color": "#FF0000",
                "transition": "background-color 0.5s ease"
            });

        } else if (progress > 10 && progress < 20) {
            $("#barre > div").css({
                'background': '#FF3300'
            });

        } else if (progress > 20 && progress < 30) {
            $("#barre > div").css({
                'background': '#FF6600'
            });

        } else if (progress > 30 && progress < 40) {
            $("#barre > div").css({
                'background': '#FF9900'
            });

        } else if (progress > 40 && progress < 50) {
            $("#barre > div").css({
                'background': '#FFFF00'
            });
        } else if (progress > 50 && progress < 60) {
            $("#barre > div").css({
                'background': '#99FF00'
            });

        } else if (progress > 60 && progress < 70) {
            $("#barre > div").css({
                'background': '#66FF00'
            });

        } else if (progress > 70 && progress < 80) {
            $("#barre > div").css({
                'background': '#33FF00'
            });

        } else if (progress > 80 && progress < 100) {
            $("#barre > div").css({
                'background': '#00FF00'
            });
        } 
        
        console.log(score)

    }

}());