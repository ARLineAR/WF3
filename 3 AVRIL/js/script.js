// Attendre le chargment du DOM

$(document).ready(function(){

    // Vérifier le genre de l'avatar
    var avatarWoman = $('#avatarWoman');
    var avatarMan = $('#avatarMan');
    var avatarGender

    // => avatarWoman capter le click
    avatarWoman.click(function(){

         //  Désactiver avatarMan

         avatarMan.prop('checked', false);

        //  Modifier la valeur de avatarGender
        avatarGender = avatarWoman.val();

    
        // Vider le message d'erreur
        $('.labelGender b').text('');
            });


    // => avatarMan capter le click
    avatarMan.click(function(){       

        // Désactiver avatarWoman

        avatarWoman.prop('checked', false);

        //  Modifier la valeur de avatarGender
        avatarGender = avatarMan.val();

        // Vider le message d'erreur
        $('.labelGender b').text('');


         });

    // Supprimer les messages d'erreur
    $('input, select').focus(function(){

        // Sélectionner la balise précédant le input
        $(this).prev().children('b').text('');

    });

           


    // Capter la soumission du formulaire dans la page
    $('form').submit( function(evt){

        //  Bloquer le comportement par défaut du formulaire 
        evt.preventDefault();

        // Définir une variable pour la validation finale du formulaire
        var formScore = 0;

        // Récupérer la valeur de #avatarName
        var avatarName = $('#avatarName').val();
        var avatarAge = $('#avatarAge').val();
        
        var avatarStyleTop = $('#avatarStyleTop').val();
        var avatarStyleBottom = $('#avatarStyleBottom').val();

        // Vérifier les champs du formulaire
            //  =>avatarName minimum 5 caractères
            if (avatarName.length < 5){

                // Ajouter un message d'erreur dans le label du dessus
                $('[for="avatarName"] b').text(' Minimum 5 caractères');

            } else{

                // Incrémenter la variable formScore
                formScore++;

            };

            // => avatarAge entre 1 et 100
            if (avatarAge.length == 0 || avatarAge > 100 || avatarAge.length == 0 ){
        

                 // Ajouter un message d'erreur dans le label du dessus
                $('[for="avatarAge"] b').text(' Entre 1 et 100 ans');

            } else{
               
                // Incrémenter la variable formScore
                formScore++;


            };

            // =>avatarStyleTop obligatoire
            if(avatarStyleTop == 'null'){
            
                 // Ajouter un message d'erreur dans le label du dessus
                $('[for="avatarStyleTop"] b').text(' Champ obligatoire');

            }else{

                // Incrémenter la variable formScore
                formScore++;

            };

            //  => avatarStyleBottom obligatoire
            if(avatarStyleBottom == 'null'){

                 // Ajouter un message d'erreur dans le label du dessus
                $('[for="avatarStyleBottom"] b').text(' Champ obligatoire');
                
            }else{

                // Incrémenter la variable formScore
                formScore++;

            };

            if( avatarGender == undefined ){
                // => avatarGender vérifier la valeur
               
                // Ajouter un message d'erreur dans le label du dessus
                $('.labelGender b').text(' Champ obligatoire');

            }else{
                

                // Incrémenter la variable formScore
                formScore++;

            };

            // Vérifier la valeur de la variable formScore
            console.log(formScore);

            // Vérifier la valeur de la variable formScore
            if( formScore == 5 ){
                console.log('Le formulaire est validé !');

                // => Envoyer les données du formulaire et attendre la réponse du serveur e, Ajax
                // => Le serveur répond true

                // Vider les champs du formulaire

                $('form')[0].reset();
            };

    

           

            
    });


}); // Fin de la fonction d'attente de chargement du DOM