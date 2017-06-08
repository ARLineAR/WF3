<?php

namespace General;

require('espace1.php');
require('espace2.php');

use Espace1;
use Espace2;
use PDO; // Lorsqu'on est dans un namespace défini (General) et que l'on souhaite ajouter une classe existante dans l'espace global (ex : PDO ou MySqli) de PHP alors on doit importer la classe avec l'instruction USE.'

// De manière générale on doit toujours importer les namespace (USE) dont on a besoin.
// use Espace1, Espace2; // cela marche également

$c = new Espace1\A;
echo $c -> test1() .'<br>';

$d = new Espace2\A;
echo $d -> test2();

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '');