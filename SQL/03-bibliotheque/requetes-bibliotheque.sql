-- ****************************
-- Création de la BDD
-- ****************************

CREATE DATABASE bilbiothèque;

USE bilbiothèque;

-- copie/colle le contenu de bibliotheque.sql dans la console

-- ****************************
-- Exercices
-- ****************************

-- 1. Quel est l'id_abonne de Laura ?
SELECT id_abonne FROM abonne WHERE prenom= 'Laura';

-- 2. L'abonné  d'id_abonne 2 est venu emprunter un livre à quelle date ?
SELECT  date_rendu, date_sortie FROM emprunt WHERE id_abonne =2;

-- 3. Combien d'emprunts ont été effectués en tout ?
SELECT COUNT(id_emprunt) FROM emprunt;

-- 4. Combien de livres sont sortis le 2011-12-19 ?
SELECT COUNT(date_sortie) FROM emprunt WHERE date_sortie =  '19-12-2011';

-- 5. Une Vie est de quel auteur ?
SELECT auteur FROM livre WHERE titre = 'Une vie';

-- 6. De combien de livres d'Alexandre Dumas dispose-ton ?
SELECT COUNT(id_livre) FROM livre WHERE auteur = 'ALEXANDRE DUMAS';

-- 7. Quel id_livre est le plus emprunté ?
SELECT id_livre, COUNT(id_livre) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre;

-- 8. Quel id_abonne emprunte le pluys de livres ?
SELECT id_abonne, COUNT(id_emprunt) FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 1;

-- ****************************
-- Les requêtes imbriquées
-- ****************************
-- Syntaxe "aide-memoire" de la requêtes imbriquée :
-- SELECT a FROM table_de_a WHERE b IN (SELECT b FROM table_de_b WHERE condition);

-- Afin de réaliser une requête imbriquée il faut obligatoirement un champ en commun entre les deux tables.

-- UN champ NULL se teste avec IS NULL :
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL;
-- affiche les id_livre non-rendus

-- Afficher les titres de ces livres non-rendus :
SELECT titre FROM livre WHERE id_livre IN 
    (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL) ;

-- Afficher le n° des livres que Chloé a emprunté :
SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'Chloé');
-- quand il n'y a qu'un seul résultat dans le requête imbriquée on met un signe =


-- Exercices
-- **************************** 
-- afficher le prenom des abonnés ayant emprunté un livre le 19-12-2011
SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie = '2011-12-19');

-- afficher le prenom des abonnés ayant emprunté un livre d'Alphonse DAudet
SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN (SELECT id_livre FROM livre WHERE auteur = 'Alphonse Daudet'));

-- afficher le ou les titres des livres que Chloé a emprunté
SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Chloé'));

-- afficher le ou les titres de livre que Chloé n'a pas encore rendu(s) :
SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Chloé'));

-- Combien de livres Benoit a-t-il emprunté?
SELECT COUNT(id_livre) FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Benoit');

-- Qui (prenom) a emprunté le plus de livre ?
SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 1);
-- remarque : on peut pas utiliser LIMIT dans IN mais obligatoirement dans un "=" 



-- ****************************
-- Jointures internes
-- **************************** 
-- Différences entre une jointure et une requête imbriquée : une requête imbriquée est possible seulement dans le cas où les champs affichés (ceux qui sont dans le SELECT) sont issus de la même table.
-- Avec une requête de jointure les champs selectionnés peuvent être issus de tables différentes. Une jointure est une requête permettant de faire des relations entre les différentes tables afin d'avoir des colonnes ASSOCIEES qui ne forment qu'un SEUL résultat.

-- Afficher le prénom, les dates de sortie et de rendu pour l'abonné Guillaume :
SELECT a.prenom, e.date_sortie, e.date_rendu 
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
WHERE a.prenom = 'Guillaume';

-- 1ere ligne : ceque je souhaite afficher
-- 2e ligne : la 1ere table d'où proviennent les informations
-- 3e ligne : la 2nde table d'où proviennent les informations
-- 4e ligne : la jointure qui lie les 2 tables avec le champ COMMUN
-- 5e ligne : la ou les conditions supplémentaires


-- Exercices
-- **************************** 

-- Nous aimerions connaître les mouvements des livres (titres, date_sortie et date_rendu) écrits par Alphonse Daudet :
SELECT e.date_rendu, e.date_rendu, l.titre FROM emprunt e INNER JOIN livre l ON e.id_livre = l.id_livre WHERE l.auteur = 'Alphonse Daudet';

-- Qui a emprunté une "Une Vie" sur l'année 2011 ?
SELECT a.prenom, e.date_sortie, e.date_rendu 
FROM abonne a 
INNER JOIN emprunt e ON a.id_abonne = e.id_abonne
INNER JOIN livre l ON e.id_livre = l.id_livre 
WHERE l.titre = 'Une Vie' AND e.date_sortie LIKE '2011%';
-- (AND e.date_sortie BETWEEN '2011-01-01' AND '2011-12-31')

SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie LIKE '2011%' AND id_livre IN (SELECT id_livre FROM livre WHERE titre = 'Une Vie'));

-- Afficher le nombre de livres empruntés par chaque abonné
SELECT a.prenom, COUNT(e.id_livre) AS nombre
FROM abonne a
INNER JOIN emprunt e ON a.id_abonne = e.id_abonne
GROUP BY a.id_abonne;

-- Afficher qui a emprunté quels livres et à quelles dates de sortie (prenom, date_sortie, titre) :
SELECT a.prenom, e.date_sortie, l.titre
FROM abonne a
INNER JOIN emprunt e ON a.id_abonne = e.id_abonne
INNER JOIN livre l ON e.id_livre = l.id_livre;
-- Ici pas de GROUP BY car il est normal que les prénoms  sortent plusieurs fois (ils peuvent emprunter plusieurs livres)

-- Afficher les prenoms des abonnés avec les id_livre qu'ils ont empruntés :
SELECT a.prenom, e.id_livre
FROM abonne a 
INNER JOIN emprunt e ON a.id_abonne = e.id_abonne;


-- ****************************
-- Jointures externes
-- **************************** 
-- Une jointure externe permet de faire des requêtes sans correspondance exigée entre les valeurs requêtées.

-- Ajoutez vous dans la table abonne :
INSERT INTO abonne (prenom) VALUES ('Aline');

-- Si on relance la dernière requête de jointure externe nous n'apparaissont pas dans la liste car nous n'avons pas emprunté de livre.
-- Pour y remédier nous faisons une jointure externe :

SELECT  a.prenom, e.id_livre
FROM abonne a
LEFT JOIN emprunt e
ON a.id_abonne = e.id_abonne;
-- La clause LEFT JOIN permet de rapatrier TOUTES les données de la tables étant à gauche l'instruction LEFT JOIN (donc abonne dans notre cas), sans correspondance exigée dans l'autre table (emprunt ici).

-- Voici le cas avec un livre supprimé de la bibliotheque
DELETE FROM livre WHERE id_livre = 100;

-- On visualise les emprunts avec une jointure interne
SELECT emprunt.id_emprunt, livre.titre
FROM emprunt
INNER JOIN livre
ON emprunt.id_livre = livre. id_livre;
-- On ne voit pas dans le résultat de cette requête le livre "Une Vie" qui a été supprimé.

-- On visualise les emprunts avec une jointure externe
SELECT emprunt.id_emprunt, livre.titre
FROM emprunt
LEFT JOIN livre
ON emprunt.id_livre = livre. id_livre;
-- Ici tous les emprunts sont affichés, y compris ceux pour lesquels les titres sont affichés et remplacés par NULL.


-- ****************************
-- UNION
-- **************************** 
-- L'Union permet de fusionner le résultat de deux requêtes dans la meême liste de résultat.

-- Exemple : si on désinscrit Guillaume  (suppression du profil de la table abonne), on peut afficher à la fois tous les livres empruntés, y compris ceux par des lecteurs désinscrits (on affiche NULL à la place de Guillmaume), et tous les abonnés, y compris ceux qui n'ont rien emprunté (on affiche NULL dans id_livre pour l'abonné 'Aline').

-- Suppression du profil de Guillaume :
DELETE FROM abonne WHERE id_abonne = 1;

-- Requête sur les livres empruntés avec UNION :
(SELECT abonne.prenom, emprunt.id_livre FROM abonne LEFT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne)
UNION
(SELECT abonne.prenom, emprunt.id_livre FROM abonne RIGHT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne);


