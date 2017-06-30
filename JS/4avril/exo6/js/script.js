// Attendre le chargement du DOM
$(document).ready(function(){

    /*
    homePage 
    */
    
        // Ouvrir le burger menu
        $('.homePage h1 + a').click(function(evt){

            // Bloquer le comportement naturel de la balise a
            evt.preventDefault();
            console.log('click');

            // Appliquer la fonction slideToggle sur la nav
            $('.homePage nav').slideToggle();

        }); // Fin Burger menu

        // Burger menu : navigation
        $('.homePage nav a').click(function(evt){

            // Bloquer le comportement naturel de la balise a
            evt.preventDefault();

            var linkToOpen = $(this).attr('href');

            // Fermer le buger menu
            $('.homePage nav').slideUp(function(){

                

                // Changer de page 
                window.location = linkToOpen;
            });


        }); // Fin nav

        /*
        aboutPage
        */
            // Capter le click sur le burger menu
            $('.aboutPage h1 + a').click(function(evt){

                // Bloquer le comportement naturel de la balise a
                evt.preventDefault();

                // Sélectionner la nav pour y appliquer une fonction animate
                $('.aboutPage nav').animate({
                    left:'0'
                });

            });

            // Capter le click sur le burger menu
            $('.aboutPage nav a').click(function(evt){

                // Bloquer le comportement naturel de la balise a
                evt.preventDefault();

                 var linkToOpen = $(this).attr('href');

                // Sélectionner la nav pour y appliquer une fonction animate
                $('.aboutPage nav').animate({
                    left:'-100%'
                    
                }, function(){

                    // Changer de page
                    window.location = linkToOpen;

                });
            });
       
        



}); // Fin de la fonction de chargement du DOM
    
