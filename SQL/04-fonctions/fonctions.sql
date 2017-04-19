-- ****************************
-- FONCTIONS PREDEFINIES
-- **************************** 
-- Fonctions prédéfinies : prévue par le langage SQL, et exectutées par le développeur

-- Dernier Id inséré :
INSERT INTO abonne (prenom) VALUES ('test');
SELECT LAST_INSERT_ID(); -- permet d'afficher le dernier identifiant inséré



-- Fonctions de dates :
SELECT *, DATE_FORMAT(date_rendu, '%d-%m-%Y') AS date_rendu_fr FROM emprunt; -- met les dates du champ date_rendu_fr au format français JJ-MM-AAAA (Si y minuscule => AA (les deux derniers chiffres de l'année en question).


SELECT NOW(); -- affiche la date et l'heure en cours

SELECT DATE_FORMAT (NOW(), '%d-%m-%Y %H:%i:%s');

SELECT CURDATE(); -- retourne la date du jour au format YYYY-MM-DD
SELECT CURTIME(); -- retourne l'heure courante du jour au format hh:mm:ss

-- Crypter un mot de passe avec l'algoithme AES :
SELECT PASSWORD('mypass'); -- affiche 'mypass' crypté par l'algoithme AES
INSERT INTO abonne (prenom) VALUES(PASSWORD('mypass')); -- insère le mot de passe crypté en base 

-- Concaténation :
SELECT CONCAT('a', 'b', 'c'); -- concatène les 3 chaînes de caractères 
SELECT CONCAT_WS(' - ', 'a', 'b', 'c'); -- concat with separator

-- Fonctions sur les chaînes de caractères :
SELECT SUBSTRING('bonjour', 1, 3); -- affiche 'bon' : compte trois à partir de la position 1
SELECT TRIM('    bonjour      '); -- supprime les espaces avant et après la chaîne de caractères
-- Source pour trouver des Fonctions SQL : http://sql.sh/

