<?php
//***************************************
// Les cookies
//***************************************
/* 
    Un cookie est un petit fichier (4ko max) déposé par le serveur du site sur le poste de l'internaute, et qui peut contenir des informations sous forme de texte. Les cokkies sont automatiquement envoyés   au serveur par le navigateur. Lorsque l'internaute navigue dans les pages concernées par les cookies. 

    PHP peut très facilement récupérer les données contenues dans un cookie : ces informations sont stockées dans la superglobale $_COOKIE.

    Précautions à prendre avec les cookies : un cookie étant sauvegardé sur le poste de l'internaute il peut être volé ou détourné. On n'y stocke donc pas de données sensibles (mots de passse, n° de CB etc).
*/

// Application paratique : nous allons stocker la langue choisie par l'internaute dans un cookie.

// 1- Affectation de langue à la variable $langue :
if(isset($_GET['langue'])){ // si une langue est passée dans l'URL c'est que nous avons cliqué sur un lien
    $langue = $_GET['langue'];
} elseif (isset($_COOKIE['langue'])) {  // $_COOKIE est une superglobale dont l'indice correspond au nom du cookie. On entre dans le elseif si un cookie appelé "langue" a été enovoyé par le client
    $langue = $_COOKIE['langue'];
} else {
    $langue = 'fr'; // par défaut si aucun chois n'est fait et que n'existe pas de cookie alors on affecte 'fr'
}

// 2- Envoi du cookie avec la langue :
$un_an = 365 * 24 * 60 * 60;   // un an exprimé en secondes

setCookie('langue', $langue, time() + $un_an);  // setCookie('nom', 'valeur', 'date expiration en timestamps') permet de créer et d'envoyer le cookie vers le client

// 3- Affichage de la langue :
echo 'Votre langue : ';
switch($langue) {
    case 'fr' : echo 'français' ; break;
    case 'es' : echo 'espagnol' ; break;
    case 'en' : echo 'anglais' ; break;
    case 'it' : echo 'italien' ; break;
}





?>



<h1>Votre langue :</h1>

<ul>
    <li><a href="?langue=fr">Français</a></li>
    <li><a href="?langue=es">Espagnol</a></li>
    <li><a href="?langue=en">Anglais</a></li>
    <li><a href="?langue=it">Italien</a></li>
</ul>