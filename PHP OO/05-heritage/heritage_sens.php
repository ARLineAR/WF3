<?php

//  Transitivité : si une classe B hérite d'une classe A et qu'une classe C hérite de la classe B alors C hérite de A

class A{

    public function testA(){
        return 'testA';
    }
}

// --------------------

class B extends A{

    public function testB(){
        return 'testB';
    }

}

// --------------------

class C extends B{

    public function testC(){
        return 'testC';
    }

}

// --------------------

$c = new C;
echo $c-> testA() .'<br>'; // méthode de A accessible par C (héritage indirect)
echo $c-> testB() .'<br>'; // méthode de B accessible par C (héritage direct)
echo $c-> testC() .'<br>'; // méthode de A accessible par C

var_dump(get_class_methods($c)); // Affiche les trois méthodes car elles appartiennent toutes à C


/*
Commentaires :
    Transitivité : Si B hérite de A
        Et que C hérite de B...
            ... alors C hérite de A
            Les méthodes protected de A sont également disponibles dans C, même si l'héritage est indirect.

    L'héritage est :
        - non-reflexif : class D exteds  D: une classe ne peut pas hériter d'elle-même
        - non-symétrique : Si class F extends E, alors E n'est pas extends de F automatiquement.
        - Sans cycle : Si class F extends E, alors il est impossible que E extends F.
        - non-multiple : Class N extends M, P : IMPOSSIBLE en PH. Pas d'héritage multiple en PHP !!!
        
        Une classe parent peut avoir un nombre défini ou indéfini d'héritier

*/