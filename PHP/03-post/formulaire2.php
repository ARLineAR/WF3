<?php

// Exercice : créer le formulaire indiqué au tableau, récupérer les données saisies et les afficher dans la même page


// print_r($_POST);

if(!empty($_POST)){

    echo 'Ville : ' . $_POST ['ville']. '<br>';
    echo 'Code Postal : ' . $_POST ['cp']. '<br>'; // attention les name sont sensibles à la case
    echo 'Adresse : ' . $_POST ['adresse']. '<br>';
}

?>



<h1>Formulaire 2</h1>

<form method="post" action="">
    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville"><br>

    <label for="cp">Code Postal</label>
    <input type="text" id="cp" name="cp"><br>

    <label for="adresse">Adresse</label>
    <textarea name="adresse" id="adresse" ></textarea><br>

    <input type="submit" value="Valider">

</form>
