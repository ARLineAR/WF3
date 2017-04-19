-- Ouvrir la console SQL sous XAMPP :
--      cd c:\xampp\mysql\bin
--      mysql.exe -u root --password




-- ligne de commentaire en SQL, débute par --
-- Les requêtes ne sont pas sensibles à la casse, mais une convention idique qu'il faut mettre les mots-clés des requêtes en MAJUSCULES.



-- ****************************
-- requêtes générales 
-- ****************************

CREATE DATABASE entreprise; -- Crée une nouvelle BDD appelée "entreprise"

SHOW DATABASES; -- permet d'afficher les BDD disponibles

-- NE PAS SAISIR DANS LA console (destruction irréversible) :
DROP DATABASE entreprise;   --  supprimer la BDD entreprise

DROP table employes;   --  supprimer les tables employes

TRUNCATE employes;  -- vider la table employes de son contenu

-- On peut coller dans la console : (on colle le fichier sql en question)
USE entreprise;    -- se connecter à la BDD entreprise

SHOW TABLES;  --  permet de lister les tables de la BDD en cours d'utilisation

DESC employes; -- observer la structure de la table ainsi que les champs (DESC = describe)

-- *************************
-- requêtes de sélection
-- **************************
SELECT nom, prenom FROM employes; -- affiche (sélectionne) le nom et le prénom de la table employes : SELECT sélectionne les champs indiqués, FROM la ou les tables utilisées.

SELECT service FROM employes; -- affiche les services de l'entreprise

--  DISTINCT
-- On a vu dans la requête précédante que les services sont affichés plusieurs fois. Pour éliminer les doublons on utilise DISTINCT:
SELECT DISTINCT service FROM employes;

-- ALL ou *
--  On peut afficher toutes les infos issues d'une table avec une * (pour dire ALL)
SELECT * FROM employes; -- affiche toute la table employe

-- clause WHERE
SELECT prenom, nom FROM employes WHERE service = 'informatique'; -- affiche le prenom et le nom des employes du service informatique. Notez que le nom des champs ou des tables ne prennent pas de quotes, alors que les valeurs telles que 'informatique' prennent des quotes ou des guillemets. Cependant, s'il s'agit d'un chiffre, on ne lui met pas de quote.

-- BETWEEN
SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31';-- affiche les employes dont la date d'embauche est entre 2006 et 2010

-- LIKE
SELECT prenom FROM employes WHERE prenom LIKE 's%'; -- affiche les prenoms des employes qui commencent par un "s". Le signe % est un joker qui remplace les autres caractères.

SELECT prenom FROM employes WHERE prenom LIKE '%-%'; -- affiche les prenoms composés. LIKE est utilisé entre autres pour les formulaires de recherche sur les sites.

-- Opérateurs de comparaisons:
SELECT prenom, nom, service FROM employes WHERE service != 'informatique'; 
-- affiche le prenom et le nom des employes n'étant pas du service informatique

--      =
--      <
--      >
--      <=
--      >=
--      != ou <> pour 'différent de'

-- ORDER BY pour faire des tris :
SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire; -- affiche les employes par salaire en ordre croissant par défaut.

SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire ASC, prenom DESC;
-- ASC pour un tri ascendant, DESC pour un tri descendant. ici on trie les salaires par ordre croissant puis à salaire identique, les prénoms par ordre décroissant.

-- LIMIT
SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1;
-- affiche l'employe ayant le salaire le plus élevé : on trie d'abord les salaires par ordre décroissant (pour avoir le plus élevé en premier), puis on limite le résultat au premier enregistrement avec LIMIT 0,1. Le 0 signifie le point de départ de LIMIT, et le 1 signifie prendre un enregistrement. On utilise LIMIT dans la pagination sur les sites.

-- L'alias avec AS :
SELECT nom, prenom, salaire * 12 AS salaire_annuel FROM employes;
-- affiche le salaire sur 12 mois des employes. salaire_annuel est un alias qui "stocke" la valeur de ce qui précède.

-- SUM
SELECT SUM(salaire * 12) FROM employes; -- affiche le salaire total annuel de yous les employes. SUM permet d'additionner les valeurs de champs différents.

-- MIN et MAX :
SELECT MIN(salaire) FROM employes; -- affiche le salaire le plus bas 
SELECT MAX(salaire) FROM employes; -- affiche le salaire le plus haut

SELECT prenom, MIN(salaire) FROM employes; 
-- ne donne pas le résultat attendu car affiche le premier prenom rencontré dans la table (Jean-Pierre). Il faut pour répondre à cette question, utiliser ORDER BY et LIMIT comme au dessus.
SELECT nom, prenom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

-- AVG (average)
SELECT AVG(salaire) FROM employes; -- affiche le salaire moyen de l'entreprise

-- ROUND
SELECT ROUND(AVG(salaire), 1) FROM employes; -- affiche le salaire moyen arrondi à un chiffre après la virgule

-- COUNT
SELECT COUNT(id_employes) FROM employes WHERE sexe = 'f'; -- affiche le nombre d'employées de sexe féminin

-- IN
SELECT prenom, service FROM employes WHERE service IN ('comptabilité', 'informatique');
-- affiche les employes appartenant à la comptabilté ou à l'ionformatique

-- NOT IN
SELECT prenom, service FROM employes WHERE service NOT IN ('comptabilité', 'informatique'); -- affiche les employes n'appartenant pas à la comptabilté ou à l'ionformatique

-- AND et OR
SELECT prenom, service, salaire FROM employes WHERE service = 'commercial' AND salaire <= 2000;
-- affiche les noms des commerciaux dont le salaire est < ou = à 2000

SELECT prenom, service, salaire FROM employes WHERE (service = 'production' AND salaire = 1900) OR salaire = 2300;
-- affiche les employes du service production dont le salaire = 1900 ou dans les autres services ceux qui gagnent 2300

-- GROUP BY
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service; -- affiche le nombre d'employes par service. GROUP BY distribue les résultats du comptage par les services correspondants.

-- GROUP BY ... HAVING
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING nombre >1;
-- affiche les service où il y a plus d'un employe. HAVIN remplace WHERE dans un GROUP BY.

-- *************************
-- requêtes d'insertion
-- *************************
SELECT * FROM employes; -- on observe la table avant de la modifier

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (8059, 'alexis', 'richy', 'm', 'informatique', '2011-12-28', 1800);
-- insertion d'un employe. Notez que l'ordre des champs énoncés entre les deux paires de parenthèses doit être le même que les valuers conrrespondantes.

-- Une requête sans préciser les champs concernés :
INSERT INTO employes VALUES(8060, 'test', 'test', 'm', 'test', '2012-12-28', 1800, 'valeur en trop');
-- insertion d'un employe sans préciser la liste des champs si et seulement si le nombre et l'ordre des valeurs attenduessont respectés -> ici erreur car il y a une valeur en trop !

-- ****************************
-- requêtes de modification
-- ****************************

-- UPDATE
UPDATE employes SET salaire = 1870 WHERE nom = 'cottet'; 
-- modifie le salaire de l'employe de nom 'Cottet'

UPDATE employes SET salaire = 1871 WHERE id_employes = 699;
-- il est recommandé de faire des modification de données par les id car ils sont uniques. Cela évite d'updater plusieurs enregistrements à la fois.'

UPDATE employes SET salaire = 1872, service = "autre" WHERE id_employes = 699;
-- on modifie 2 valeurs dans la même requête

-- A ne pas faire (sauf cas contraire) : un UPDATE SANS CLAUSE WHERE :
UPDATE employes SET salaire = 1870;
--  ici les salaires de TOUS les employés passent à 1870

-- REPLACE INTO
REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test', 'test', 'm', 'marketing', '2010-07-05', 2600);
-- l'id_employes 2000 n'existant pas, REPLACE se comporte comme un INSERT

REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test2', 'test2', 'm', 'marketing', '2010-07-05', 2601);
-- l'id_employes 2000 n'existant pas, REPLACE se comporte comme un UPDATE

-- ****************************
-- requêtes de suppression
-- ****************************

-- DELETE
DELETE FROM employes WHERE id_employes = 900;
-- suppression de l'employe dont l'id est 900

DELETE FROM employes WHERE service = 'informatique' AND  id_employes != 802;
-- suppression de tous les informaticiens sauf 1 (dont l'id est 802)

DELETE FROM employes WHERE id_employes = 388 OR id_employes = 990;
-- supprime  2 employes qui n'ont pas de point commun. Il s'agit d'un OR et non d'un AND car un employe ne peut pas avoir 2 id_employes différents


-- A ne pas faire : un DELETE sans clause WHERE :
DELETE FROM employes;
-- Revient à faire un TRUNCATE de table qui est irreversible

-- ****************************
-- Exercies
-- ****************************

-- 1. Afficher le service de l'employe 547
SELECT service FROM employes WHERE id_employes = 547;

-- 2. Afficher la date d'embauche d'Amandine
SELECT date_embauche FROM employes WHERE prenom = 'Amandine';

-- 3. Afficher le nombre de commerciaux
SELECT COUNT(id_employes) FROM employes WHERE service = 'commercial';

-- 4. Afficher le coût des commerciaux sur l'annuel
SELECT SUM(salaire * 12) FROM employes WHERE service = 'commercial';

-- 5. Afficher le salaire moyen par service
SELECT AVG(salaire), service FROM employes GROUP BY service;

-- 6. Afficher le nombre de recrutements sur l'année 2010 (3 syntaxes possibles)
SELECT COUNT(id_employes) FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';
SELECT COUNT(id_employes) FROM employes WHERE date_embauche LIKE '2010%';
SELECT COUNT(id_employes) FROM employes WHERE date_embauche >= '2010-01-01' AND date_embauche <=
'2010-12-31';

-- 7. Augmenter le salaire de chaque employé de 100
UPDATE employes SET salaire = (salaire + 100);

-- 8. Afficher le nombre de services différents
SELECT COUNT(DISTINCT(service)) FROM employes;

-- 9. Afficher le nombre d'employés par service
SELECT service, COUNT(id_employes) FROM employes GROUP BY service;

-- 10. Afficher les infos de l'employe du service commercial ayant le salaire le plus élévé
SELECT nom, prenom, salaire FROM employes WHERE service = 'commercial' ORDER BY salaire  DESC LIMIT 0,1;

-- 11. Afficher l'employé ayant été embauché en dernier
SELECT nom, prenom, salaire FROM employes ORDER BY date_embauche DESC LIMIT 1;

















