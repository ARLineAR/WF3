    // Attendre le chargement du DOM
    $(document).ready(function(){


        // Manipuler le contenu texte du footer
        console.log( $('footer').text() );
        // $('footer').text('Sous la licence MIT');

        // Manipuler le contenu HTML du footer
        console.log( $('footer').html() );
        $('footer').html('Sous la licence <b>MIT</b>');

        // Créer un objet pour la page d'accueil
        var homeContent = {
            title:'Bienvenue sur mon site',
            content:'Je suis le texte de la page <b>Accueil</b>'
        };

        var homeContent = {
            title:'Bienvenue sur la page Portfolio',
            content:'Je suis le texte de la page <b>Portfolio</b>'
        };

        var homeContent = {
            title:'Bienvenue sur la page Contacts',
            content:'Je suis le texte de la page <b>Contacts</b>'
        };
    
    // Créer une fonction pour générer le menu
    function showMyContent(){

        // Capter le click sur la première li
        $('li').click( function(){

            // Récupérer la valeur de l'attribut data
            var dataValue = $(this).attr('data');




            // Modifier le contenu de la balise h2
            $('h2').text( homeContent.title );

            // Modifier le contenu de la balise page
            $('p').html( homeContent.content );

        
    });

 };

 showMyContent();


        
        

    }); // FIn de la fonction du dDOM
