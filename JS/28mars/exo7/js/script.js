// Créer une fonction sans paramètre
function helloWorld(){
    
    //  Ecrire le coe à exécuter à l'appel de la fonction
    console.log('Bonjour le monde');

};

// Appeler la fonction
helloWorld();


// Créer une fonction avec paramètres
function fullName( firstName, lastName ){

    console.log('Bonjour ' + firstName + ' ' + lastName);

};

// Appeler la fonction en précisant les paramètres
fullName( 'Aline', 'AR');
fullName( 'A', 'R');