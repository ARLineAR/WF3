<?php

// Exercice : réaliser un formulaire "pseudo" et "email" dans formulaire3.php en récupérant et affichant les informations dans formulaire4.php.
// De plus une fois le formulaire soumis, vérifiez que le pseudo n'est pas vide. Si tel est le cas affichez un message d'erreur à l'internaute dans (formulaire4.php).

?>




<h1>Formulaire 3</h1>
<form method="post" action="formulaire4.php">
    <label for="pseudo">Pseudo</label>
    <input type="text" id="pseudo" name="pseudo"><br>

     <label for="email">Email</label>
    <input type="text" id="email" name="email"><br>

    <input type="submit">


</form>