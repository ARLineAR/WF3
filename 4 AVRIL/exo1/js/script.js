// Attendre le chargement du DOM
$(document).ready(function(){



    // Fonction animate()
    $('section:first button').click(function(){


        // Changer la largeur et la largeur de l'article
        $('section:first article').animate({
            height: '40rem',
            width: '20rem'

        });

    });
    

    // Fonction animate() valeurs dynamiques
    $('section:nth-child(2) button').click(function(){

        $('section:nth-child(2) article').animate({
            // Pas d'espace entre le égal et la valeur
            left: '+=5rem',
            top: '-=1rem',
            width: '*=2rem',
            height: '/=.5rem'

        });
    });

    // Fonction animate() : toggle/show/hide
    $('section:nth-child(3) button').click(function(){

        $('section:nth-child(3) article').animate({

            width: 'toggle'
        });
    });

    // Fonction animate() avec callBack
    $('section:last button').click(function(){

        $('section:last article').animate({

            width: '20rem',
            height: '20rem'


        }, 2000, function(){
            alert('Fin de l\'animation');
        });

       

    });






}); // Fin de la fonction d'attente de chargement du DOM