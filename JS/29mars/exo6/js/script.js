
// Créer une fonction qui permet à l'utilisateur de choisir une couleur

function chooseColor(){

    // Demander à l'utilisateur de choisirune couleur
    var userPrompt = prompt('Choisir une couleur entre rouge, vert et bleu');

    // Appeler la fonction de traduction
    translateColor( userPrompt );

};

// Créer une fonction pour traduire les couleurs
function translateColor( paramColor ){

   
    if ( paramColor == 'rouge') { // Si paramColor est égal à 'rouge'

        console.log('Rouge se dit Red en anglais');

    } else if( paramColor == 'bleu' ) { // Si paramColor est égal à 'bleu'

        console.log('Bleu se dit Blue en anglais');

    } else if ( paramColor == 'vert' ) {  // Si paramColor est égal à 'vert'

        console.log('Vert se dit Green en anglais');

    } else{ // Dans tous les autres cas

        console.log('Je ne connais pas cette couleur...');

        // Rappeler la fonction pour refaire choisir une couleur (si couleur inconnue)
        chooseColor();
    };
    
};



