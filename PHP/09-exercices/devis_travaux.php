<?php
/* 
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous réalisez la validation du formulaire : le montant doit être en nombre positif non nul, et la période de construction conforme aux valeurs que vous aurez choisies.

	3- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.
	
	Formule de calcul d'un montant TTC :  montant TTC = montant HT * (1 + taux / 100) où taux est par exemple égale à 20.

	4- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

	5- Vous diffusez des codes de remises promotionnelles, dont un est 'abc' offrant 10% de remise. Ajoutez un champ au formulaire pour saisir le code de remise. Vous validez ce champ qui ne doit pas excéder 5 caractères. Puis la fonction montantTTC applique la remise (-10%) au montant total des travaux si le code de l'internaute est correcte. Vous affichez dans ce cas "Le montant de vos travaux est de X euros avec une TVA à Y% incluse, et y compris une remise de 10%.". 

*/

$contenu = '';
$fonction ='';

echo '<pre>'; var_dump($_POST); echo '</pre>';
function montantTTC($montantHT, $taux){
		switch($taux){

			case  'plus' : $taux = 10; break;
			case  'moins' : $taux = 20; break;
		}
			$montantTTC = $montantHT * (1 + $taux / 100);

		$textPromo = '';
		if(($_POST['promo']) == 'abc'){

			$montantTTC = 0.9 * $montantTTC;
			$textPromo .= ', et y compris une remise de 10%';
		}
	return "Le montant de vos travaux est de $montantTTC euros avec une TVA à $taux % incluse$textPromo.";

		

} // Fin function montantTTC



if(!empty($_POST)){

	if(!is_numeric($_POST['montant']) || $_POST['montant']< 0) {

		$contenu .= 'Le montant n\'est pas valable';
	}

	if(!($_POST['date'] == 'plus') || ($_POST['date'] == 'moins')) {

		$contenu .= 'Vous devez sélectionner une date de construction';
	}

	if(strlen($_POST['promo']) > 5){
		$contenu .= 'Le code promo ne doit pas dépasser 5 caractères';
	}


	if(empty($contenu)){

		$fonction = montantTTC($_POST['montant'], $_POST['date'], $_POST['promo']);
	}



} // Fin du if(!empty($_POST))


?>




<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Votre devis de travaux</title>
	</head>
	<body>
		<h1>Votre devis de travaux</h1>
		<?php echo $contenu . '<br>';?>
		<?php echo $fonction . '<br>';?>
		<form method="post" action="">

			<label for="montant">Montant des travaux</label><br>
			<input type="text" name="montant" id="montant"><br><br>

			<label for="date">Date de construction</label><br>		
			<input type="radio" name="date" value="plus" checked>Plus de 5ans	
			<input type="radio" name="date" value="moins">Moins de 5ans	<br><br>

			<label for="promo">Promotions</label><br>
			<input type="text" name="promo" id="promo"><br><br>

			<input type="submit" value="Envoyer">	
		
		</form>
		
	</body>
</html>