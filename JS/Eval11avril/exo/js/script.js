// Attendre le chargement du DOM
    $(document).ready(function(){

          // Créer une fonction pour le choix de l'utilisateur

            $('select').change(function(){

            
                // Modifier l'image au choix de l'utilisateur
                if ($(this).val() == 'sushi'){
                    $('img').attr('src', 'img/chat_1.jpg');

                } else if ($(this).val() == 'maki'){
                    $('img').attr('src', 'img/chat_1.jpg');

                } else if ($(this).val() == 'sashimi'){
                    $('img').attr('src', 'img/chat_2.jpg');
                    
                } else if ($(this).val() == 'yakitori'){
                    $('img').attr('src', 'img/chat_3.jpg');

                } else if ($(this).val() == 'onigri'){
                    $('img').attr('src', 'img/chat_4.jpg');

                } else {
                    $('img').attr('src', 'img/chat_0.jpg');
                };

        // Soumettre le formulaire
        $('form').submit(function(evt){

            // Bloquer le comportement naturel du formulaire
            evt.preventDefault();

        // Définir les variables du formulaire
        var userChoice = $('select');
        var userMessage = $('textarea');
        var formScore =0;


            // Conditions
          

            }); // Fin de la sélection d'image

        
         // Vérifier que l'utilisateur a bien sélectionné une image
        if( (userChoice).val() == 'null' ){

            // Ajouter une class error sur l'input
           $('select b').addClass('error');
    
        }else{
  
            // Incrémenter la valeur de la variables
            formScore++;
        };

        // Vérifier qu'il y a au moins 15 caractères dans le champ du message

        if( (userMessage).val() < 15){

            // Afficher le message d'erreur
            $('textarea b').text('Au moins 15 caractères requis !');

        }else{

            // Incrémenter la valeur de formScore
            formScore++;

        };

        // Validation du formulaire
        if( formScore == 2 ){

            $('form').fadeOut();
            $('span').fadeIn();

              // Envoi des données dans le traitement PHP
            // PHP répond true => continuer le traitement du formulaire   
        };
        
                







}); // Fin soumission formulaire

       






    }); // Fin du chargement du DOM
    