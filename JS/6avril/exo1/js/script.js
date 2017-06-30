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

            // Afficher le titre du projet
            var modalTitle = $(this).prev().text();
            $('#modal span').text(modalTitle);

            // Afficher l'image du projet
            var modalImage = $(this).parent().prev().attr('src');
            $('#modal img').attr( 'src', modalImage ).attr('alt', modalTitle);

            // Afficher la modal
            $('#modal').fadeIn();
        });

        // Fermer la modal au click sur .fa-times
        $('.fa-times').click(function(){
            $('#modal').fadeOut()
        });
    };

    // Créer une fonction pour la gestion du formulauire
    function contactForm(){
        // Capter le focus sur les inputs et le textarea
        $('input:not([type="submit"]), textarea').focus(function(){

            // Sélectionner la balise précédente pour y ajouter la class openedLabel
            $(this).prev().addClass('openedLabel hideError');
            
        });

         // Fermer la modal
         $('.fa-times').click(function(){
             $('#modal').fadeOut();
         });

        // Supprimer le message d'erreur sur la checkbox
        $('[type="checkbox"]').focus(function(){
            
            $('form p').addClass('hideError');
        });

        // Capter le blur sur les inputs et le textarea
        $('input, textarea').blur(function(){

            // Vérifier s'il n'y a pas de caractères dans le input
            if( $(this).val().length == 0 ){
         
                // Sélectionner la balise précédente pour supprimer la class openedLabel
                $(this).prev().removeClass();

                // Supprimer le message d'erreur du select
                $('select').focus(function(){

                 $(this).prev().removeClass();
                });

             };

        });

        // Capter la soumission de mon formulaire
        $('form').submit(function(evt){

            // Bloquer le comportement naturel du formulaire
            evt.preventDefault();

            // Définir les variables globales du formulaire
            var userName = $('#userName');
            var userEmail = $('#userEmail');
            var userSubject = $('#userSubject');
            var userMessage = $('#userMessage');
            var checkbox = $('[type="checkbox"]');
            var formScore = 0;

            // Vérifier que userName a au minimu 2 caractères
            if( userName.val().length < 2 ){
                // Afficher le message d'erreur
                $('[for="userName"] b').text('Minimum 2 caractères');
            } else{
                
                // Incrémenter la valeur de formScore
                formScore++;

            };

            // Vérifier que userEmail a au moins 5 caractères
            if( userEmail.val().length < 5 ){
               // Afficher le message d'erreur
                $('[for="userEmail"] b').text('Minimum 5 caractères');
            } else{
                
                // Incrémenter la valeur de formScore
                formScore++;

            };

            // Vérifier que l'utilisateur a bien sélectionné un userSubject
            if( userSubject.val() == 'null'){
                // Afficher le message d'erreur
                $('[for="userSubject"] b').text('Vous devez choisir un sujet');
            } else{
                
                // Incrémenter la valeur de formScore
                formScore++;
            };

            // Vérifier s'il y a au moins 5 caractères dans userMessage
            if( userMessage.val().length < 5 ){
               // Afficher le message d'erreur
                $('[for="userMessage"] b').text('Minimum 5 caractères');
            } else{
              
                // Incrémenter la valeur de formScore
                formScore++;

            };

            // Vérifier si la checkbox est cochée
            if( checkbox[0].checked == false ){
               $('form p b').text('Vous devez accepter les conditions générales');

            }else{
                console.log('CG => OK');
                // Incrémenter la valeur de formScore
                formScore++;
            };

            // Validation finale du formulaire
            if( formScore == 5 ){
                console.log('Le formulaire est validé !');

                // Envoi des données dans le traitement PHP
                // PHP répond true => continuer le traitement du formulaire

                    // Ajouter la valeur de userName dans la balise h2 span de la modal
                    $('#modal span').text( userName.val() );

                    // Afficher la modal
                    $('#modal').fadeIn();

                    // Vider les champs du formulaire
                    $('form')[0].reset();

                    // Supprimer les messages d'erreur
                    $('form b').text('');

                    // Replacer les labels
                    $('label').removeClass();


            };

            

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

            // Créer une variable pour récupérer la valeur de l'attribut href
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

                            // Appeler la fonction pour ouvrir la modal
                            openModal();

                        };

                        // Vérifier si l'utilisateur est sur la page contacts.html
                        if( viewToLoad == 'contacts.html'){

                            // Déclencher la fonction de gestion du formulauire
                            contactForm();
                        };

                    });

                });
                
            });


        }); // Fin burger menu nav


}); // Fin de la fonction de chargement du DOM
    
