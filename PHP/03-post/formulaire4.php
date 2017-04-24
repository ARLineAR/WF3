<?php

// Exercice : réaliser un formulaire "pseudo" et "email" dans formulaire3.php en récupérant et affichant les informations dans formulaire4.php.
// De plus une fois le formulaire soumis, vérifiez que le pseudo n'est pas vide. Si tel est le cas affichez un message d'erreur à l'internaute dans (formulaire4.php).


if(!empty($_POST)){

    if(!empty($_POST['pseudo'])){

    echo 'Pseudo : ' . $_POST['pseudo'] . '<br>';
    }else{
            echo 'Vous devez compléter ce champ <br>';

    }
       
    echo 'Email : ' . $_POST['email'] . '<br>';
}
 


?>

