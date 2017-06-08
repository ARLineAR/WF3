<?php




class Homme{

    private $prenom; // Propriété $prenom de visibilté private
    private $nom; // Propriété $nom de visibilté private

    public function setPrenom($arg){
        if(!empty($arg) && is_string($arg) && strlen($arg) > 3 && strlen($arg) < 20){
            $this -> prenom =$arg; // $this correpond à l'objet qui exécute  cette méthode
        }
    }
    public function getPrenom(){
        return $this -> prenom;
    }



     public function setNom($arg){
        if(!empty($arg) && is_string($arg) && strlen($arg) > 1 && strlen($arg) < 20){
            $this -> nom = $arg;

        }

    }

    public function getNom(){
        return $this -> nom;
    }
}

   

// ------------------------
$homme = new Homme;
// $homme -> prenom = 'Yakine'; //ERREUR : Propriété private donc innaccessible à l'extérieur de la classe
// echo $homme -> prenom;

$homme -> setPrenom('Aline');
echo 'Prénom : ' . $homme -> getPrenom();

echo '<br>';

$homme -> setNom('AR');
echo 'Nom : ' . $homme -> getNom();


/*
Commentaire :
    Pourquoi faire des gatters et des setters ?
        - Le PHP est un langage qui ne type pas ses variables. Il faut systématiquement controler l'intégrité des données renseignées.
        - Donc utiliser la visibilté PRIVATE est une très bonne contrainte. Tout dev' devra obligatoirement passer par le setter pour affecter une valeur, et donc par les contrôles !

    Setter : Pour affecter une valeur
    Getter : Pour récupérer une valeur
    On aura autant de getter et setter que de propriétés private
    $this représente à l'intérieur de la classe de l'objet en cours de manipulation.

*/