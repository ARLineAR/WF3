<?php

class Vehicule{

    private $litreEssence; // Nbre de litres d'essence dans le véhicule
    private $reservoir; // Capacité max du réservoir

    public function getLitreEssence(){
        return $this -> litreEssence;
    }

     public function setLitreEssence($litre){
       $this -> litreEssence = $litre;
    }

    public function getReservoir(){
        return $this -> reservoir;
    }

     public function setReservoir($res){
       $this -> reservoir = $res;
    }


}

// ------------
class Pompe{

    private $litreEssence;

     public function getLitreEssence(){
        return $this -> litreEssence;
    }

     public function setLitreEssence($litre){
        $this -> litreEssence = $litre;
    }

    public function faireLePlein(Vehicule $v){
        // $v -> getLitreEssence();
        $litre_a_mettre = $v -> getReservoir() - $v -> getLitreEssence();
        // 45 = 50 -5
        $v -> setLitreEssence($v -> getLitreEssence() + $litre_a_mettre);
        $this -> setLitreEssence($this -> getLitreEssence()- $litre_a_mettre);


    }

}

// ------------

$vehicule = new Vehicule;

$vehicule -> setLitreEssence(5);
$vehicule -> setReservoir(50);

echo 'Dans le véhicule il y a : ' . $vehicule -> getLitreEssence() . 'L d\'essence';

echo '<br>';

$pompe = new Pompe;

$pompe -> setLitreEssence(800);

echo 'Dans la  pompe : ' . $pompe -> getLitreEssence() . 'L d\'essence <hr>';

$pompe -> faireLePlein($vehicule);

echo 'Après ravitaillement : ';
echo '<br>';
echo 'Dans le véhicule il y a : ' . $vehicule -> getLitreEssence() . 'L d\'essence';
echo '<br>';
echo 'Dans la  pompe : ' . $pompe -> getLitreEssence() . 'L d\'essence';


// echo 'Essence dans la pompe : ' . $pompe 