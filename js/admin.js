(function () {
    "use strict";
    $("document").ready(init);
    var nbstyles = 1,
        nbparoles = 1;

    function init(e) {
        $("#addstyle").click(ajouterStyle);
        $("#addparoles").click(ajouterParoles);
    }

    function ajouterStyle () {
        if (nbstyles < 4) {
            nbstyles++;
            
            var content = $('#styles').html(),
                newselect = $("<select name=\"IdStyle"+nbstyles+"\">");
            if ($("#styles").children('[value="false"]').length == 0) {
            content = content + "<option value=\"false\">Aucun</option>";
            newselect.html(content);
            $('#styles').after(newselect);
        }
    }
    
    function ajouterParoles () {
        if (nbparoles < 4) {
            nbparoles++
            $('[name="Paroles"]').after('<br /><textarea placeholder="Suite des paroles..." rows="5" cols="50" name="Paroles'+nbparoles+'"></textarea>');
        }
    }
}());