// Ajouter une class à une balise
var myTitle = document.querySelector('h1');

// Ajouter une class à la balise h1
myTitle.classList.add('error');


// Sélectionner la dernière balise p
var myLastP = document.querySelector('p:last-of-type');
// console.log(myLastP);

//  Supprimer la class hidden
myLastP.classList.remove('hidden');


//  Sélectionner la balise button
var myButton = document.querySelector('button');

// Sélectionner la première balise h2
var myFirstH2 = document.querySelector('h2');

// Capter le click sur le bouton
myButton.onclick = function(){
    // console.log('Clique sur le bouton');

    // Ajouter ou supprimer la class move sur le apremière balise H2
    myFirstH2.classList.toggle('move');
};