// Attendre le chargement du DOM
$(document).ready(function(){

    // Ouvrir la modal
    $('button').click(function(){
        $('section').fadeIn();
    });

    // Fermer la modal
    $('.fa, section').click(function(){

        
        $('section').fadeOut(); // $(this).parent().parent().parent().fadeOut(); 
        
    });


    // Capter les touches du clavier
    $(document).keyup(function(evt){

    
        console.log(evt.keyCode);

        if(evt.keyCode == 27 ){
            $('section').fadeOut();
        };

    });







}); // Fin de la fonction d'attente de chargement du DOM