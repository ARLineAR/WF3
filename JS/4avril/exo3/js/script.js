// Attendre le chargement du DOM
$(document).ready(function(){


   
    $('h3').click(function(){

        // Fermer la balise suivant .open
        $('.open').not(this).next().slideUp().prev().removeClass('open').toggleClass('fa-arrow-right').toggleClass('fa-arrows');

        // Faire un toggle de la class open sur la balise h3
        $(this).toggleClass('open');

        // Faire un slideToggle sur la balise suivante
        $(this).next().slideToggle();

        // Sélectionner la balise .fa pour toggle la classe .fa-arrow-right et un toggle sur la class
        $(this).children('.fa').toggleClass('fa-arrow-right').toggleClass('fa-arrows');


    });




   







}); // Fin de la fonction d'attente de chargement du DOM