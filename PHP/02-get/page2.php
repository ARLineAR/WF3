<h1>Page détail des articles</h1>

<?php
// ***********************************
// La superglobale $_GET
// ***********************************
// $_GET représente l'URL : il s'agit d'une superglobale et comme toutes les superglobales, d'un ARRAY. Superglobale signifie qu'il est disponoble dans tous les contextes du script y compris dans les fonctions : il n'est pas nécessaire de faire global $_GET.

// Les inforamtions transitent dans l'URL de la manière suivante (du client au serveur):
// page.php?indice1=valeur1&indice2=valeur2         (sans espace)
// Chaque indice de cette URL correspond à indice de l'array $_GET et chaque valeur aux valeurs correspondantes aux indices.


print_r($_GET);

if(isset($_GET['article']) && isset($_GET ['couleur']) && isset($_GET ['prix']) ) {
// si existent les indices article, couleur et prix, on peut les affciher
    echo 'Article : ' . $_GET ['article'] . '<br>';
    echo 'Couleur : ' . $_GET ['couleur'] . '<br>';
    echo 'Prix : ' . $_GET ['prix'] . '<br>';

}else{

    echo 'Aucun produit sélectionné';
}


