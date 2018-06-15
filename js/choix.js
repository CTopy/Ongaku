(function () {
    "use strict";
    $("document").ready(init);

    function init(event) { 
        $("#jeu .checkbox").slice(0,4).css("display", "block");
        $("#style .checkbox").slice(0,4).css("display", "block");
        $("#langue .checkbox").slice(0,4).css("display", "block");

        $(".up").click(monter);
        $(".down").click(descendre);
    }

    function monter(event) {
        var id = $(this).parent(".fieldset").attr("id"),
            div = $("#"+id),
            enfants = div.children(".checkbox");
        
        if (enfants.length > 4) {
            enfants.last().prependTo(div);
            enfants.css("display", "none");
            enfants.slice(0,4).css("display", "block");
        }
    }

    function descendre(event) {
        var id = $(this).parent(".fieldset").attr("id"),
            div = $("#"+id),
            enfants = div.children(".checkbox");
        
        if (enfants.length > 4) {
            enfants.first().appendTo(div);
            enfants.css("display", "none");
            enfants.slice(0,4).css("display", "block");
        }
        }
})();