<?php

class Membre{

    public $id_membre;
    public $pseudo;
    public $email;

    public function inscription(){
        return 'Je m\'inscris';
    }

    public function connexion(){
        return 'Je me connecte !';
    }

}




// ------- (généralement on ne fait pas 2 class dans un même fichier)--------

class Admin extends Membre { // extends signifie "hérite de"
    
    // tout le code de membre est ici

    public function accesBackOffice(){
        return 'J\'ai accès au back-office';
    }


}

// ---------------

$admin = new Admin;
echo $admin-> inscription() . '<br>';
echo $admin-> connexion() . '<br>';
echo $admin-> accesBackOffice() . '<br>';

/*
Commentaires :

    Dans notre site, un admin est avant tout un membre avec quelques fonctionnalités supplémentaires (accès au back-office, suppression des membres etc). Il est donc naturel que la classe admin soit héritière (extends) de la classe membre et qu'on ne réécrive pas tout le code.
*/