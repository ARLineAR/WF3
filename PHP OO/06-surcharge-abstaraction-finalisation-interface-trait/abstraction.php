<?php




abstract class Joueur{

    public function seConnecter(){

        return $this -> etreMajeur();
    }

    abstract public function etreMajeur();


}

// ------------------------

class JoueurFr extends Joueur {

    public function etreMajeur(){ // Une méthode abstraite n'a pas de contenu.

        return 18;

    } 


}


// ------------------------

class JoueurUs extends Joueur{

    public function etreMajeur(){ // Une méthode abstraite n'a pas de contenu.

        return 21;

    } 


}

// ------------------------

$fr = new JoueurFr;
echo $fr -> seConnecter() . '<br>';

$us = new JoueurUs;
echo $us -> seConnecter() . '<br>';

/*
Commentaires:

    - Une classe abstraite ne peut pas être instanciée.
    - Les méthodes abstraites n'ont pas de contenu 
    - Pour déclarer une méthode abstraite on doit obligatoirement être dans une classe abstraite.
    - Une classe abstraite peut contenir des méthodes normales.
    - Lorsqu'on hétrite d'une classe abstraite on doit OBLIGATOIREMENT redéfinir les méthodes abstraites

    Le développeur maître qui est au coeur de l'application va obliger les autres déveolppeurs à redéfinir des méthodes. Ceci est une bonne pratique dans le cadre d'un travail collectif et hiérarchisé



*/