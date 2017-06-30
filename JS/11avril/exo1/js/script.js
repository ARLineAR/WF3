// Attendre le chargement du DOM
    $(document).ready(function(){

        // Définir une modal
        var boxChecked;
       
    // UI checkbox
        $('[type="checkbox"]').click(function(){


            // Définir la valeur de boxChecked
            boxChecked= $(this).val();

            // Décocher les checkbox
            var checkboxArray =  $('[type="checkbox"]').not($(this))

            for( var i = 0; i < checkboxArray.length; i++){
                checkboxArray[i].checked = false;
            };

        // Modifier l'image
            if($(this).val() == 'first' ){
                $('img').attr('src', 'img/1.jpg');

            } else if ($(this).val() == 'second'){
                $('img').attr('src', 'img/2.jpg');

            } else if ($(this).val() == 'third'){
                $('img').attr('src', 'img/3.jpg');
            } else{
                $('img').attr('src', 'img/4.jpg');
            };

    });

    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        // Bloquer le comportement par défaut du formulaire
        evt.preventDefault();

        /* 
            - Vérifier quelle checkbox est cochée
            - Afficher une modal avec l'image sélectionnée
            - Réinitialiser le formulaire
            
        */

        if(boxChecked == undefined){
            console.log('Voius devez choisir une image')
            
        } else{
            // Afficher la modal
            $('#modal').fadeIn();
        }
        

    });

 });