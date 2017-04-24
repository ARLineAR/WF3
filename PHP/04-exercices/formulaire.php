<?php

// Exercice : 
/*
    1. Réaliser un formulaire permettant de sélectionner un fruit dans un sélecteur, et de saisir un poids quelconque exprimé en grammes.
    2. Faire le traitement du formulaire pour afficher le prix du fruit choisi selon le poids indiqué, en passant par la fonction calcul.
    3. Faire en sorte de garder le fruit choisi et le poids saisi dans les chmaps du formulaire après que celui-ci soit validé.
*/




if(!empty($_POST['fruit'])){
    echo calcul($_POST['poids']);
}else{
    echo 'Aucun fruit sélectionné';
}

?>


<form method="post"action="">

<select name="fruit" id="fruit">
    <option value="cerises">Cerises</option>
    <option value="bananes">Bananes</option>
    <option value="pommes">Pommes</option>
    <option value="peches">Pêches</option>
</select>

<label for="poids">Poids</label>
<input type="text" id="poids" name="poids">

</form>

