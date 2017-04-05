// Sélecteur de balise HTML (tag)
var myParaTag = document.getElementsByTagName('p');
console.log( myParaTag ); // [p.myClass, p]


// Sélecteur de class
var myClass = document.getElementsByClassName('myClass');
console.log( myClass ); // [h2.myClass, p.myClass]


// Sélecteur d'id
var myId = document.getElementById('myId');
console.log( myId ); /*<h2 id=​"myId">​Contacts​</h2>​*/

console.log( document.querySelector('p') );// => Seulement p


// Sélecteur querySelectorAll
console.log( document.querySelectorAll('.myClass') ); // => toutes les classes [h2.myClass, p.myClass]

