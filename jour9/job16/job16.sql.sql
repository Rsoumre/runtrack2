SELECT 
    salles.nom AS "Biggest Room",
    salles.capacite,
    etage.nom AS nom_etage
FROM salles
JOIN etage ON salles.id_etage = etage.id
ORDER BY salles.capacite DESC
LIMIT 1;
