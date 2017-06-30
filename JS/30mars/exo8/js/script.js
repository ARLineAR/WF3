    // Attendre le chargement du DOM
    $(document).ready(function(){


        // Code à exécuter sur la page une fois chargé

        /*
        Les sélecteurs jQuery "classiques"
        */

        // Sélectionner une balise par son nom (tag)
        var myHtmlTag = $('header');
        console.log( myHtmlTag );

        // Sélectionner une/des balise/s par sa class
        var myClass = $('.myClass');
        console.log( myClass);

        // sélectionner une/des balise/s par son Id
        var myId = $('#myId');
        console.log( myId );

        // Sélecteur imbriqué
        var myItalic = $('h2 i');
        console.log( myItalic );

        // Sélecteur CSS3
        var myFooter = $('body > main + footer ');
        console.log( myFooter );

    /*
        Les sélecteurs jQuery spécifiques
    */

        // Sélecteur d'enfants
        var myChildren = $('header').children('button');
        console.log( myChildren );

        // Sélecteur de parents
        var myParent = $('h2').parent();
        console.log( myParent );

        // Rechercher une balise
        var myH2 = $('main').find('h2');
        console.log( myH2 );

        // Sélectionner le premier
        var firstBtn = $('button:first');
        console.log( firstBtn );

        // Sélectionner le dernier
        var lastBtn = $('button:last');
        console.log( lastBtn );

        // Sélectionner la nth balise
        var secondLi = $('li').eq(1);
        console.log( secondLi );

        // Sélectionner la balise suivante
        var afterMain = $('main').next();
        console.log( afterMain );

        // Sélectionner la balise précédante
        var beforeMain = $('main').prev();
        console.log( beforeMain );

         /*
            Le deathSelector
        */

        var deathSelector = $('h3').prev().parent().parent().next().parent().find('main').children('article').find('h3');
        console.log( 'Balise sélectionnée : ', deathSelector );


    }); // Fin de la fonction d'attente de chargement du DOM

