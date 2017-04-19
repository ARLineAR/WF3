-- ***********************************
-- EXERCICES
-- ***********************************

-- 1. Qui conduit la voiture d'id_vehicule 503 ?
SELECT c.prenom, c.nom 
FROM conducteur c 
INNER JOIN association_vehicule_conducteur a ON c.id_conducteur = a. id_conducteur 
WHERE a. id_vehicule = 503;

    -- OU

SELECT prenom, nom FROM conducteur WHERE id_conducteur IN (SELECT id_conducteur FROM association_vehicule_conducteur WHERE id_vehicule = 503);


-- 2. Quel prenom conduit quel modèle ?
SELECT c.prenom, c.nom, v.marque, v.modele, v.couleur
FROM conducteur c
INNER JOIN association_vehicule_conducteur a ON c.id_conducteur = a. id_conducteur 
INNER JOIN vehicule v ON a.id_vehicule = v.id_vehicule;

-- 3. INsérez-vous dans la table conducteur. Puis afficher tous les conducteurs (même ceux qui n'ont pas de véhicule affecté) ainsi que les modèles de véhicules.
INSERT INTO conducteur (prenom, nom) VALUES ('Aline', 'Rambier');

SELECT c.prenom, c.nom, v.marque, v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a ON c.id_conducteur = a. id_conducteur 
LEFT JOIN vehicule v ON a.id_vehicule = v.id_vehicule;

-- 4. Ajoutez l'enregistrement suivant :
INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES ('Renault', 'Espace', 'noir', 'ZE-123-RT');
-- Puis afficher tous les modeles de vehicule, y compris ceux qui n'ont pas de chauffeur affecté, et le prenom des conducteurs.
SELECT v.marque, v.modele, c.prenom, c.nom
FROM vehicule v
LEFT JOIN association_vehicule_conducteur a ON a.id_vehicule = v.id_vehicule 
LEFT JOIN conducteur c ON c.id_conducteur = a. id_conducteur;


-- 5. Afficher les prenoms des conducteurs (y compris ceux qui n'ont pas de vehicule') et tous les modeles y compris ceux qui n'ont pas de chauffeur.

SELECT c.prenom, c.nom, v.marque, v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a ON c.id_conducteur = a. id_conducteur 
LEFT JOIN vehicule v ON a.id_vehicule = v.id_vehicule

UNION

SELECT c.prenom, c.nom, v.marque, v.modele
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur a ON c.id_conducteur = a. id_conducteur 
RIGHT JOIN vehicule v ON a.id_vehicule = v.id_vehicule;


