<?php
// Exercice :

/*

    - Faire 4 liens HTML avec le nom des fruits.
    - Quand on clique sur un lien on affiche le prix pour 1000 grammes de ce fruit, dans cette page (lien_fruits.php).

*/



include ('fonction.inc.php');

if(!empty($_GET['fruit'])){ // Ou avec isset
    echo calcul($_GET['fruit'], 1000);
}else{
    echo "Ce fruit n'existe pas";
}


?>

<h1>Fruits</h1>

<a href="?fruit=cerises">Cerises</a><br>   <!-- Autre écriture possible -->
<a href="lien_fruits.php?fruit=bananes">Bananes</a><br>
<a href="lien_fruits.php?fruit=pommes">Pommes</a><br>
<a href="lien_fruits.php?fruit=peches">Pêches</a>
