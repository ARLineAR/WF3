<?php
/*
    1- Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement.
    Cette fonction prend 2 pramètres : une date (valide) et le format de conversion 'US' ou 'FR'

    2- Vous validez que le paramètre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.
*/
$date = '';
$format = ''; 

// Version avec obket date

function afficheDate($date, $format) {
    
    $objetDate = new DateTime($date);

    if ($format == 'FR') {
        return $objetDate->format('d-m-Y') . '<br>';

    }elseif ($format =='US') {
        return $objetDate->format('Y-m-d') . '<br>';
    }else {
        return 'Le format demandé n\'est pas correct';
    }

}


echo afficheDate('25-09-1990','US');
echo afficheDate('25-09-1990','FR');

echo '<br>';


// Version sans objet
function conversion($date, $format) {


        if($format =='FR'){

            echo strftime('%d-%m-%Y', strtotime($date)) . '<br>'; // strtotime retourne la date donnée en timestamp. strftime retourne le timestamp formaté selon le format indiqué avec des %

        }elseif($format =='US'){

            echo strftime('%Y-%m-%d', strtotime($date)) . '<br>';
        } else {
        return 'Le format demandé n\'est pas correct';
    }
           
}

conversion('25-09-1990','US');
conversion('25-09-1990','FR');