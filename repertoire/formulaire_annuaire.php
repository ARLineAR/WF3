<!--

Nom
Prénom
Téléphone
Profession
Ville
CP
Adresse
date de naissance : Jour - Mois - Année
Sexe : Homme - Femme
Description 
Submit - inscription
-->
<?php

    $mysqli = new mysqli("localhost", "root", "", "repertoire");

    if(isset($_POST['inscription'])){

        echo '<pre>';
        print_r($_POST);
        echo'</pre>';

        // echo '<pre>';
        // var_dump($_POST);
        // echo'</pre>';
        echo '<div class="succes" style=" width: 15%; ">';
        foreach($_POST as $indice => $valeur){
            
            echo "<p>$indice - $valeur <br></p>";
        }

        echo '</div>';
        $date_de_naissance = $_POST['annee'] ."  ". $_POST['mois'] ." ". $_POST['annee']; 

    }
    $a=10; $b=5; $c=2;
if($a == 8)	echo "1";
elseif($a != 10) echo "2";
else echo "3";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Annuaire</title>

    
    <style>
        label, select{float: left; width: 100px;}
        fieldset{float: left; width: 220px;}
        .submit{clear: both;}
        .erreur{background: #ff0000;}
        .succes{background: #669933;}
    
    </style>
</head>
<body>

    <form action="" method="post">
        <fieldset>
            <legend>Informations</legend>
            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="nom"><br><br>

            <label for="prenom">Prénom</label><br>
            <input type="text" name="prenom" id="prenom"><br><br>

            <label for="profession">Profession</label><br>
            <input type="text" name="profession" id="profession"><br><br>

            <label for="ville">Ville</label><br>
            <input type="text" name="ville" id="ville"><br><br>

            <label for="codepostal">Code postal</label><br>
            <input type="text" name="codepostal" id="codepostal"><br><br>

            <label for="adresse">Adresse</label><br>
             <textarea id="adresse" placeholder="Votre adresse" cols="16"></textarea><br><br>
             <hr>
             <legend>Informations supplémentaires</legend><br>

            <label for="date_de_naissance">Date de naissance</label><br><br>
            <label for="jour">Jour</label><br>
            <select name="jour" id="jour">
                <?php for($i=1; $i<=31; $i++){
                    if($i<=9){
                    echo "<option>0$i</option>";
     
                    }else{
                        echo "<option>$i</option>";
                    }
                }
                ?>
            </select><br><br>
                
            <label for="mois">Mois</label><br>
            <select for="mois" name="mois">
                <option value="01">Janvier</option>
                <option value="02">Février</option>
                <option value="03">Mars</option>
                <option value="04">Avril</option>
                <option value="05">Mai</option>
                <option value="06">Juin</option>
                <option value="07">Juillet</option>
                <option value="08">Août</option>
                <option value="09">Septembre</option>
                <option value="10">Octobre</option>
                <option value="11">Novembre</option>
                <option value="12">Décembre</option>
            
            </select><br><br>
            
            <label for="annee">Année</label><br>
            <select name="annee" id="annee">
                <?php
                    for($i = date("Y"); $i >= 1930; $i--){
                        echo "<option>$i</option>";
                    }
                ?>
            </select><br><br>

            <label for="sexe">Sexe</label><br>
            <input type="radio" value="Femme" id="femme"  >Femme
            <input type="radio" value="Homme" id="homme" checked>Homme<br><br>

            <label for="description">Description</label><br>
            <textarea id="description" placeholder="Ajouter une description" cols="16"></textarea><br><br>

            <input type="submit" value="Inscription" name="inscription">
        
      
        </fieldset>
    

    
    
    
    
    </form>
    
</body>
</html>
