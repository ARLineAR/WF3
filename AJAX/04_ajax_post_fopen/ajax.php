<?php

$email = "";
if(isset($_POST['email'])){
    $email = $_POST['email'];
}

// création d'un fichier via la fonction fopen
//en mode a php crée le fichier s'il n'existe pas sinon in ne fait que l'ouvrir

$f = fopen("email.txt", "a");
fwrite($f, $email . "\n"); // "\n" permet le retour à la ligne dans un fichier. Il doit être entre "" sinon il ne sera pas interprété.

$tab = array();
$tab['resultat'] ='<h2>Confirmation de l\'inscription</h2>';

$liste = file("email.txt"); // la fonction file() place chaque ligne du fichier précisé en argument dans un tableau array.

$tab['resultat'] .= '<p>Voici la liste de tous les inscrits</p>';

$tab['resultat'] .= '<ul>';
foreach($liste as $valeur){
    $tab['resultat'] .= '<li>' .$valeur . '</li>';

}

$tab['resultat'] .='</ul>';
echo json_encode($tab);
