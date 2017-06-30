// Créer un tableau contenant 4 prénoms
var users = ['John', 'Georges', 'Paul', 'Ringo' ];

//  Saluer chacun des prénoms
// console.log( 'Salut ' + users[0] );
// console.log( 'Salut ' + users[1] );
// console.log( 'Salut ' + users[2] );
// console.log( 'Salut ' + users[3] );

//  Faire une boucle for sur le tableau pour saluer chacun des prénoms
for( var i = 0; i < users.length; i++ ){

    console.log(i);

    // Code à exécuter à chaque itération (boucle)
    console.log('Salut ' + users[i]);
}