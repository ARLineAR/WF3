<?php


class Membre{

    private $pseudo;
    private $mdp;


    public function setPseudo($pseudo){

        if(!empty($pseudo) && is_string($pseudo) && strlen($pseudo) > 4 && strlen($pseudo) < 20){
            $this -> pseudo = $pseudo;
        } 
    }

    public function getPseudo(){
        return $this -> pseudo;
    }


     public function setMdp($mdp){
        if(!empty($mdp) && is_string($mdp)){
            $salt = 'Aline' . time(); 
            $salt = md5($salt);
            // On enregistre le salt dan sla BDD par membre
            $mdp_a_crypte =$salt . $mdp;
            $mdp_crypte = md5($mdp_a_crypte);
            $this -> mdp = $mdp_crypte;

        }else{
            return FALSE;
        }

    }

    public function getMdp(){
        return $this -> mdp;
    }
    
}

// -------------------------

//  EXERCICE : Au regard de ctte classe, ceuillez créer un membre, affecter des valeurs à $pseudo et $mdp et les afficher :

$membre = new Membre;

$membre -> setPseudo('Alien');
echo 'Pseudo : ' . $membre -> getPseudo();

echo '<br>';

$membre -> setMdp('AlineAR');
echo 'Mot de passe : ' . $membre -> getMdp();