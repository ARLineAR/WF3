<?php


class Panier{

    public $nbProduit; // propriété (variable), public est une visibilté

    public function ajouterProduit(){
        // traitements de la méthode
        return 'L\'article a bien été ajouté au panier !';
    }

    protected function retirerProduit(){
        return 'L\'article a été retiré du panier !';
    }

    private function affichagePanier(){
        return 'Voici les produits dans le panier';
    }
    

}

//  ---------------------
$panier = new Panier; // Instanciation. $panier représente un objet de la classe Panier.
var_dump($panier); // #1 => $panier est le premier objet (la référence n°1) de la classe Panier; (1) => une seule propriété($nbProduit) mais vide (NULL)
echo '<br>';
var_dump(get_class_methods($panier)); // permet d'afficher les différentes méthodes (ici une seule est visible car de visibilité 'public')

$panier -> nbProduit = 5;
echo 'Nombre de produits : ' .$panier -> nbProduit . '<br>';
echo '<pre>';
var_dump($panier); // print_r pour les arrays et var_dump pour les objets (donne plus d'infos)
echo '</pre>';

echo 'Panier : ' . $panier -> ajouterProduit() . '<br>';
// echo 'Panier : ' . $panier -> retirerProduit() . '<br>'; // ERREUR : Impossible d'accéder à un élément protected à l'extérieur de la classe.
// echo 'Panier : ' . $panier -> affichagePanier() . '<br>'; // ERREUR : Impossible d'accéder à un élément private à l'extérieur de la classe.

$panier2 = new Panier;
echo '<pre>';
var_dump($panier2);
echo '</pre>';

/*
Commentaires :
    New : est un mot-clé qui permet de créer un objet issu d'une classe (instanciation)

    On peut créer plusieurs objets d'une même classe. Et lorsqu'on affecte une valeur à une propriété d'un objet cela n'a pas d'incidence sur les autres objets de la classe.

    Niveaux de visibilité : 
        - public : Accessbile de partout.
        - protected : Accessible depuis la classe où l'élément a été déclaré ainsi que depuis les classes héritières.'
        - private : Accessible uniquement depuis la classe où l'élément a été déclaré

*/