// Demander à l'utilisateur de choisir une couleur entre rouge, verrt et bleu
var userChoice = prompt('Choisir une couleur entre rouge, vert ou bleu');


if ( userChoice == 'rouge') { // Si userChoice est égal à 'rouge'

    console.log('Rouge se dit Red en anglais');

} else if( userChoice == 'bleu' ) { // Si userChoice est égal à 'bleu'

    console.log('Bleu se dit Blue en anglais');

} else if ( userChoice == 'vert' ) {  // Si userChoice est égal à 'vert'

    console.log('Vert se dit Green en anglais');

} else{ // Dans tous les autres cas

    console.log('Je ne connais pas cette couleur...');
};