// Attendre la chargement du DOM
$(document).ready(function(){


    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        // Définir une variable pour le sxore du formulaire
        var formScore = 0

        // Bloquer le comportement naturel du formulaire
        evt.preventDefault();

        // Connaître la valeur saisie par l'utilisateur dans le input
        var userName = $('input').val();
        console.log( $('input').val());

        // Connaître le nombre de caractères dans la valeur
        console.log( userName.length);

        // Connaître la valeur saisie dans le textarea par l'utilisateur
        var userMessage = $('textarea').val();
        // Connaîte le nombre de caractères dans la valeur
        console.log(userMessage.length);

        // Vérifier la taille de userName (min. 1 caractères)
        if(userName.length == 0 ){
            console.log('Vous devez indiquer votre nom');
            // Afficher une message d'erreur dans le label dans le label
            $('[for="userName"] b').text('Champ obligatoire');
    
        }else{
            console.log('userName Ok');
            // Incrémenter formScore
            formScore++;
        };

        // Vérifier la taille de userMessage (min. 5 caractères)
        if( userMessage.length < 4 ){
            console.log('Minimum 5 caractères');
            $('[for="userMessage"] b').text('Minimum 5 caractères');
            

        }else{
            console.log( 'userMessage Ok');
            // Incrémenter formScore
            formScore++;
        };

        // vérifier la valeur de formScore pour valider le formulaire
        if( formScore == 2 ){
            console.log('Le formulaire est validé !')

            // => Envoyer les données dans le fichier PHP et attendre la réponse du PHP (true/false)

            // Le PHP répond true !

            // Ajouter le message dans la liste
            $('section:last').append('<article><h4>' + userMessage + '</h4><p>' + userName + '</p></article>');

            // Vider les champs du formulaire
            $('input:not([type="submit"])').val('');
            $('textarea').val('');
        };

        // Supprimer les ùessages d'erreur
        $('input, textarea').focus(function(){

            $(this).prev().children('b').text('');
        });
        

    }); // Fin de la soumission du formulaire
   




}); // Fin de la fonction de chargement du DOM
