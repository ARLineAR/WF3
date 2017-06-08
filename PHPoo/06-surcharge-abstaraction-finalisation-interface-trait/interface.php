<?php


interface Mouvement{

    public function start(); // Dans une interface les méthodes n'ont pas de contenu
    public function turnRight();
    public function turnLeft();

}

class Bateau implements Mouvement{ // On n'utilise pas extends mais implements dans le cadre des interfaces. On peut extends une classe dans le même temps qu'on implements une interface
    // Obligation de définir toutes les méthodes récupérées via l'implémentation de l'interface.
    public function start(){

    }
    public function turnRight(){

    }
    public function turnLeft(){

    }

}

class Avion implements Mouvement{

    public function start(){

    }
    public function turnRight(){

    }
    public function turnLeft(){

    }


}

/*
Commentaires :
    - Une interface est une liste de méthodes (sans contenu) qui permet de garantir que toutes les classes qui vont implémenter l'interface contiendront les mêmes méthodes , et la même sémantique. C'est une sorte de contrat entre le dev' maîtres et les autres dev'.

    - Une interface n'est pas instanciable.
    - Une classe peut implémenter plusieurs interfaces
    - Une classe peut à la fois extends une autre classe et implements une interface
    - Les méthodes d'une interface doivent forcément être publiques sinon elles ne peuvent pas être définies.
*/




