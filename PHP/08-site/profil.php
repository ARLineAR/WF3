<?php
require_once('inc/init.inc.php');


// ------------------------------------- TRAITEMENT -------------------------------------------
// Si visiteur non-connecté, on envoie vers la page connexion.php :
if(!internauteEstConnecte()) {
    header('location:connexion.php');   // nous l'invitons à se connecter
    exit();

    
}

echo '<pre>'; print_r($_SESSION); echo '</pre>';
$contenu .= '<h2>Bonour '. $_SESSION['membre']['pseudo'].' ! </h2>';

// Onn affiche le statut du membre :
if ($_SESSION['membre']['statut'] == 1) {
    $contenu .='<p>Vous êtes un administarteur</p>';

} else {
    $contenu .='<p>Vous êtes un membre</p>';
}


$contenu .='<div><h3>Voici vos informations de profil</h3>';
    $contenu .='<p>Votre email :'.$_SESSION['membre']['email']. '</p>';
    $contenu .='<p>Votre adresse :'.$_SESSION['membre']['adresse']. '</p>';
    $contenu .='<p>Votre code postal :'.$_SESSION['membre']['code_postal']. '</p>';
    $contenu .='<p>Votre ville :'.$_SESSION['membre']['ville']. '</p>';
$contenu .='</div>';



// ------------------------------------- AFFICHAGE -------------------------------------------


require_once('inc/haut.inc.php');

echo $contenu;

require_once('inc/bas.inc.php');