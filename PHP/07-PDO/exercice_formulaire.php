<?php
// EXERCICE :
// Principe : créer un formulaire qui permet d'enregistrer un nouvel employé dans la base entreprise.

/* Les étapes :
    1- Création du formulaire HTML
    2- Connexion à la BDD
    3- Lorsque le formulaire est posté, insertion des infos du formulaire en BDD.
    faites-le avec une requête préparée.
    4- Afficher à la fin un message "L'employé a bien été ajouté".
*/

// 1-
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if(isset($_POST)){

    echo 'idEmploye : ' .$_POST
    
}


?>


<form method="post" action="exercice_formulaire.php">

    <label for="idemploye">idEmploye</label>
    <input type="text" name="idemploye">
<br>
    <input type="text" name="prenom" placeholder="Prenom">
<br>
    <input type="text" name="nom" placeholder="Nom">
<br>

        <select name="sexe" placeholder="sexe">
            <option value="sexe">- Sexe -</option>
            <option value="f">f</option>
            <option value="m">m</option>
        </select>
<br>
    <label for="service">Service</label>
        <select name="service" id="servic">
            <option value="">- Service -</option>
            <option value="assistant">Assistant</option>
            <option value="commercial">Commercial</option>
            <option value="comptabilite">Comptabilité</option>
            <option value="communication">Communication</option>
            <option value="direction">Direction</option>
            <option value="informatique">Informatique</option>
            <option value="juridique">Juridique</option>
            <option value="production">Production</option>
            <option value="secretariat">Secrétariat</option>           
        </select>
<br>
    <label for="dateembauche">dateEmbauche</label>
    <input type="date" name="dateembauche" placeholder="dateembauche">
<br>
    <label for="salaire">Salaire</label>
    <input type="text" name="salaire" value="€">

</form>