SELECT * FROM etudiants
-- On sélectionne tous les champs de la table etudiants

WHERE naissance < DATE_SUB(CURDATE(), INTERVAL 18 YEAR);
-- CURDATE() = récupère la date actuelle (ex : '2025-07-29')
-- INTERVAL 18 YEAR = soustrait 18 ans à la date du jour (ex : '2007-07-29')
-- DATE_SUB() = retourne la date - 18 ans

