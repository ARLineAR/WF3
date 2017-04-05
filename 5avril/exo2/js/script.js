// Attendre le chargement du DOM
$(document).ready(function(){

    // Créer une fonction pour l'animation des compétences
    function mySkills( paramEq, paramWidth ){

        // Animation des balises p des skills
        $('h3 + ul').children('li').eq(paramEq).find('p').animate({
            width: paramWidth
        });

    };

    // Créer une fonction pour ouvrir la modal
    function openModal(){

        $('button').click(function(){
            $('#modal').fadeIn();
        });

        $('.fa-times').click(function(){
            $('#modal').fadeOut()
        });
    };

    // Charger le contenu home.html dans le main
    $('main').load( 'views/home.html' );

  /* 
  Burger menu
  */ 
        // Ouvrir le burger menu
        $('h1 + a').click(function(evt){

            // Bloquer le comportement naturel de la balise a
            evt.preventDefault();
            console.log('click');

            // Appliquer la fonction slideToggle sur la nav
            $('nav').slideToggle();

        }); // Fin ouverture Burger menu


        // Burger menu : navigation
        $('nav a').click(function(evt){

            // Bloquer le comportement naturel de la balise a
            evt.preventDefault();

            // Masquer le main
            $('main').fadeOut();

            var viewToLoad = $(this).attr('href');

            // Fermer le buger menu
            $('nav').slideUp(function(){
   

                //  Charger la bonne vue puis afficher le main
                  $('main').load( 'views/' + viewToLoad, function(){
                      
                      $('main').fadeIn(function(){

                        //   Vérifier si l'utilisateur veut voir la page about.html
                        if( viewToLoad =='about.html'){

                            //   Appeler la fonction mySkills
                            mySkills(0,'50%');
                            mySkills(1,'25%');
                            mySkills(2,'5%');

                         };

                         //   Vérifier si l'utilisateur veut voir la page portfolio.html
                        if( viewToLoad == 'portfolio.html'){

                            // Appeler la fonction pour ouvrur la modal
                            openModal();


                        };

                    });

                });
                
            });


        }); // Fin burger menu nav


}); // Fin de la fonction de chargement du DOM
    
