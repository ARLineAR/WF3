-- ****************************
-- TRANSACTIONS
-- ****************************
-- Une transaction permet de lancer des requêtes telles que des modifications et de les annuler si besoin, comme si vous pouviez faire un "CTRL Z" dans votre base de données.

-- Transaction simple :
START TRANSACTION; -- démarre la transaction
    SELECT * FROM employes; -- pour voir la table avant modification
    UPDATE employes SET prenom = 'ALLO' WHERE id_employes = 739;

ROLLBACK; -- donne l'ordre à MySQL d'annuler la transaction, l'employé reprend son prénom

COMMIT;-- valide l'ensemble de la transaction (impossible de faire un ROLLBACK après).

-- Si on ne fait ni ROLLBACK ni COMMIT avant la déconnexion au SGBD, c'est un ROLLBACK quii s'effectue par défaut.



-- Transaction avancée :
START TRANSACTION;
    SAVEPOINT point1; -- point de sauvegarde appelé point1
    UPDATE employes SET prenom = "Julien A" WHERE id_employes = 699;
    SAVEPOINT point2; -- point de sauvegarde appelé point2
    UPDATE employes SET prenom = "Julien B" WHERE id_employes = 699;

ROLLBACK TO point2; -- pour annuler une partie de la transaction : retour au point2 => on garde "Julien" A en base

-- ou bien :
ROLLBACK; -- pour annuler toute la transaction on garde "Julien" en base

-- ou bien : 
COMMIT; -- pour valider les opérations de la transaction => on obtient "Julien B" en base
