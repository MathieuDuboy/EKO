// Lorsque la page est chargée : le script sera prêt à gérer 2 evènements ci-dessous :
$(document).ready(function() {
    var max_fields      = 50; // Maximum de SKU autorisés par l'API
    var wrapper         = $(".input_fields_wrap"); // Ce qui englobe les champs
    var add_button      = $(".add_field_button"); // class du bouton "Ajouter un SKU"

    var x = 1; // Début du compte, 1 seul input affiché dès le départ
    $(add_button).click(function(e){ // Evènement "click" sur le bouton
        e.preventDefault();
        if(x < max_fields){
            x++;
            $(wrapper).append('<div><input class="input_class" type="text" name="mes_sku[]"/> <i class="fas fa-minus-circle remove_field"></i></div>'); // Ici on ajoute un nouvel Input
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ // Evènement "click" sur le bouton "Supprimer"
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
