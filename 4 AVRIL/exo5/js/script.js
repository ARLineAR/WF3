// Attendre le chargement du DOM
$(document).ready(function(){


    // Ouvrir le burger menu classique
    $('.fa-bars').click(function(){

        $('nav ul').fadeIn(500);

    });

    // Fermer les Burger menu
    $('a').click(function(evt){

        // Bloquer la balise a
        evt.preventDefault();
        $('nav ul').fadeOut(500);
    })



}); // Fin de la fonction d'attente de chargement du DOM