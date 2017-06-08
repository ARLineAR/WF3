<?php


final class Application{


    public function run(){ // création d'une classe finale : signifiant qu'elle ne pourra pas être héritée
        return 'L\'application se lance !';
    }
}
// -----------
// class Extension extends Application{} // IMPOSSIBLE ! Une classe finale ne peut pas être héritée.
// -----------

$app = new Application; // OK ! Une classe finale peut être instanciée
$app -> run();

class Application2{

    final public function run2(){
        return 'L\'application se lance !';
    }
}

class Extension2 extends Application2{ // OK; Application2 n'est pas final donc peut en hériter
    
    // public function run2() {} // ERREUR ! IMPOSSIBLE de redéfinir ou de surcharger une méthode finale
}

/*
Commentaires:
    - Une classe finale ne peut pas être héritée
    - Une classe finale être instanciée
    - Une classe finale n'a forcément que des méthodes finales puisque par définition elle ne pourra être héritée, donc ses méthodes ne pourront être surchargées ou redéfinies

    - Une méthode final peut être présente dans une classe "normale"
    - Une méthode final ne peut être surchargée ou redéfinie

*/