<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. Lorsque le formulaire est soumis, vous affichez "La location de votre véhicule sera de X euros pour Y jour(s)." sous le formulaire.

   2- Vous validez le formulaire : la catégorie doit être correcte et le nombre de jours un entier positif.

   3- Vous créez une fonction prixLoc qui retourne le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. 

   4- Si le prix de la location est supérieur à 150€, vous consentez une remise de 10%.

*/
$contenu ='';
$resultat ='';
function prixLoc($prix_categorie, $duree){
        
        

        if($_POST['categorie'] == 'A'){
            $prix_categorie = 30;

        }elseif($_POST['categorie'] == 'B'){
            $prix_categorie = 50;

        }elseif($_POST['categorie'] == 'C'){
            $prix_categorie = 70;

        }elseif($_POST['categorie'] == 'D'){
            $prix_categorie = 90; 

        }

        $prix_total = $prix_categorie * $duree;

        if($prix_total > 150) {
            $prix_total = 0.9 * $prix_total;
        }
        return "La location de votre véhicule sera de' . $prix_total . ' euros pour' . $duree .'jour(s)";

}

if(!empty($_POST)){

    if(!(($_POST['categorie'] == 'A') || ($_POST['categorie'] == 'B') || ($_POST['categorie'] == 'C') || ($_POST['categorie'] == 'D'))){
        $contenu .= '<div> Vous devez renseigner la catégorie </div>';
    }

    // if(!(is_numeric($_POST['jours'])) || ($_POST['jours']) > 0){
    //     $contenu .= '<div> Le nombre de jours n\'est pas valide </div>';
    // }


    // On peut aussi utiliser la fonction ctype_digit() qui vérifie si une chaîne est un entier (retourneun booléen)
    if (ctype_digit($_POST['jours']) || $_POST['jours'] < 0) $contenu .='<div> Erreur sur le nombre de jours</div>';

    /* Synthèse des types numériques :
    is_numeric vérifie si c'est un nombre, décimal ou packs
    
    is_int vérifie si c'est un entier (ne marche pas avec les formulaires : dans ce cas, caster le type en integer pour le tester  : cf ci-dessus)

    is_float verifie si c'est un nombre décimal'

    (ctype_digit vérifie si une chaîne est un entier (utile dans le cas des formulaires)
    

    */

    if(empty($contenu)){
        $resultat = prixLoc($prix_categorie, $duree);


    }
    


} //Fin validation formulaire



?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Location voitures</title>
    </head>
    <body>

    <h1>Location voitures</h1>

    <?php echo $contenu .'<br>'; ?>
    <form method="post" action="">
        <label for="categorie">Catégories</label><br>
            <select name="categorie" id="categorie">
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>                 
            </select><br><br>

        <label for="jours">Jours de location</label><br>
        <input type="text" name="jours" id="jours"><br><br>

        <input type="submit" value="Valider">
            
    </form>
    <?php echo $resultat; ?>
       
        
    </body>
</html>

  