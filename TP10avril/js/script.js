// Attente de la fonction de chargement du DOM (1)

$(document).ready(function(){

        // console.log('DOM OK');

        // Fermer la modal (7)
        $('.fa-times').click(function(){
            $('div').fadeOut();
        });

        // Supprimer les class error (9)
        $('input, select, textarea').focus(function(){
            $(this).removeClass('error');
        });

    // Capter la soumission du formulaire (2)
   
        $('form').submit(function(evt){

            // Bloquer le comprtement du formulaire
            evt.preventDefault();

            // console.log('Soumission du formulaire');

            // Définir les variables globales (3)
            var userName = $('[placeholder="Your Name*"]');
            var userEmail = $('[placeholder="Your Email*"]');
            var userSubject = $('select');
            var userMessage = $('textarea');
            var formScore = 0;
         
            // Vérifier que l'utilisateur a bien choisi son nom (4a)
    
            if( (userName).val().length == 0 ){
                // console.log('Nom obligatoire');

                // Ajouter la class error sur l'input
                userName.addClass('error');
               

            }else {
                // console.log('Nom OK');

                // Incrémenter la valeur de la variable
                formScore ++;
            };

            // Vérifier que l'utilisateur a bien choisi au moins 4 caractères (4b)
            if( (userEmail).val().length < 4 ){

                // console.log('Email au moins 4 caractères');

                
                // Ajouter la class error sur l'input
                userEmail.addClass('error');
              
            }else {
                // console.log('Email OK');
                
                // Incrémenter la valeur de la variable
                formScore ++;
            };


            // Vérifier que l'utilisateur a bien sélectionné un sujet (4c)
             
            if( userSubject.val() == 'null'){
                // console.log('Sujet obligatoire'); 

                // Ajouter la class error sur l'input
                userSubject.addClass('error');

            }else{
                // console.log('sujet OK');

                // Incrémenter la valeur de la variable
                formScore ++;

            };
                

            // Vérifier que l'utilisateur a bien choisi au moins 5 caractères dans le userMessag (4c)

            if( userMessage.val().length < 5){
                // console.log('Minimum 5 caractères');
                $('[for=userMessage').text('Minimum 5 caractères');

            }else{
                // console.log('Message OK');

                 // Incrémenter la valeur de la variable
                formScore ++;
             };

             /*
             Validation finale du formulaire
              */

              if(formScore == 4){

                // console.log('Le formulaire est validé');

                // envoi des données dans le fichier de traitement PHP
                // PHP répond true => continuer le traitement du formulaire

                // ==> Afficher les données du formulaire dans une modal  (Html et css) (5)
                $('div span').text( userName.val() );
                $('div b').text ( userSubject.val() );
                $('div p:last').text ( userMessage.val() );

                // Afficher la modal (6)
                $('div').fadeIn();

                // Vider les champs du formulaire (8)
                $('form')[0].reset();

        };

    });

}); // Fin de la fonction de chargement du DOM





            