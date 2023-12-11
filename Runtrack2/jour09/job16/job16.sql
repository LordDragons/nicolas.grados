SELECT nom, id_etage, capacite FROM salles WHERE capacite = ( SELECT MAX(capacite) FROM salles );

UPDATE salles SET nom = REPLACE(nom, '', 'Biggest Room');