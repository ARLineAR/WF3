<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone INT(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/


// 3-

$contenu = '';

if(!empty($_POST)){

		

		if(strlen($_POST['nom']) > 2 || strlen($_POST['nom']) < 20) {
			$contenu .= '<div>Le nom doit contenir au moins 2 caractères</div>';
		}



		if(strlen($_POST['prenom']) > 2 || strlen($_POST['prenom']) < 20) {
			$contenu .= '<div>Le prénom doit contenir au moins 2 caractères</div>';
		}


		if(!is_numeric($_POST['telephone']) || ($_POST['telephone']) == 10) {
			$contenu .= '<div>Le téléphone doit contenir 10 chiffres</div>';
		}



		if(!(is_numeric($_POST['annee_rencontre']) && checkdate('01','01', $_POST['annee_rencontre']))) {

			$contenu .= '';
		}

		
		if(strlen($_POST['type_contact']) != 'ami' || ($_POST['type_contact']) != 'famille' || ($_POST['type_contact']) != 'professionnel' || ($_POST['type_contact']) != 'autre') {

			$contenu .= '<div>Vous devez valider le type de contact</div>';
		}

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $contenu .= '<div>L\'email est invalide</div>';
    	}
// 4-

		if(empty($contenu)) {


			$resultat = $pdo->prepare ("INSERT INTO contact(nom, prenom, telephone, email, type_contact) VALUES (:nom, :prenom, :telephone, :email, :type_contact)");

			
			$resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
			$resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
			$resultat->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_INT);
			$resultat->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
			$resultat->bindParam(':type_contact', $_POST['type_contact'], PDO::PARAM_STR);
			
			$requete = $resultat->execute();

				if($requete){

					$contenu .= '<div>Le contact a bien été ajouté</div>';
				}else{

					$contenu .= '<div>Vous devez compléter le formulaire</div>';
				}

		}

}

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
	</head>
	<body>
	

		<h1>Formulaire de contact </h1>

		<?php echo $contenu . '<br>'; ?>
		

		<form method="post" action="">

			<label for="nom">Nom</label><br>
			<input type="text" name="nom" id="nom"><br><br>

			<label for="prenom">Prenom</label><br>
			<input type="text" name="prenom" id="prenom"><br><br>

			<label for="telephone">Telephone</label><br>
			<input type="text" name="telephone" id="telephone"><br><br>


			<label for="annee_rencontre">Année de rencontre</label><br>

	<?php
		$year = 2017;
			echo '<select>';
			while($year > 1916){
				echo "<option>$year</option>";
				$year--;

			}
						
			echo '</select>';
			echo '<br><br>';
	?>

			<label for="email">Email</label><br>
			<input type="email" name="email" id="email"><br><br>

			<label for="type_contact">Type de contact</label><br>

			
			<select name="type_contact" id="type_contact">
				<option value="ami">Ami</option>			
				<option value="famille">Famille</option>			
				<option value="professionnel">Professionnel</option>			
				<option value="autre">Autre</option>			
			</select><br><br>

			<input type="submit" value="Envoyer">
		</form>





	</body>
</html>

