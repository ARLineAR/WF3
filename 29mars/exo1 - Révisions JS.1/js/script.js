/*
    Créer un tableau contenant 4 index
    - 1 string
    - 1 number
    - 2 booleans différents
*/
var myArray = [ 'Du texte', 1990, true, false ];
console.log( myArray );

/*
    Ajouter un string dans le tableau,
    Afficher le tableau dans la console,
*/
myArray.push( 'Bonjour' );
console.log( myArray );

/*
    Afficher dans la console la taille du tableau
    Afficher le premier et le dernier index du tableau dans la console
*/
console.log( myArray.length, myArray[0], myArray[4] );

/*
    Créer un objet comprenant 3 propriétés
    - le tableau
    - 1 prénom
    - 1 âge
    Afficher l'objet dans la console
*/

var myObject = {

    array: myArray,
    name: 'Aline',
    age: 26
};
console.log( myObject );

/*
    Afficher toutes les propriétés de l'objet dans la console une par une
*/
console.log( myObject.array );
console.log( myObject.name );
console.log( myObject.age );
// Toutes les propriétés peuvent être mises sur une seule ligne

/*
    Modifier la proriété de l'objet
    Afficher l'objet dans la console
*/
myObject.age = 20;
console.log( myObject );