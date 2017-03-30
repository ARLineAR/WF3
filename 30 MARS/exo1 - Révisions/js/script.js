/* 
    - Creéer un tableau contenant 4 prénoms
    - Faire une boucle sur le tableaupour saluer dans la console chacun des prénoms

    - Afficher une message spécial pour votre prénom
*/

var namesArray = [ 'Aurore', 'Aline', 'Alain', 'Christie' ];
console.log( namesArray );

for( var i = 0; i < namesArray.length; i++ ){

    // console.log( 'Salut ' + namesArray[i] );

    if (namesArray[i] == 'Aline'){
     console.log( 'Salut c\'est moi' );

    //  Modifier une balise HTML
    document.querySelector('p').textContent = "Salut c'est moi !";

    } else{
        console.log( 'Salut ' + namesArray[i] );
    }
   
};

