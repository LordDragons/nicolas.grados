<?php

// Création de variables de types primitifs
$booleanVar = true;
$integerVar = 42;
$stringVar = "Bonjour";
$floatVar = 3.14;

// Tableau HTML avec le header
echo '<table border="1">
        <thead>
            <tr>
                <th>Type</th>
                <th>Nom</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>';

// Ajout des lignes pour chaque variable
addRowToTable("Booléen", "booleanVar", $booleanVar);
addRowToTable("Entier", "integerVar", $integerVar);
addRowToTable("Chaîne de caractères", "stringVar", $stringVar);
addRowToTable("Nombre à virgule flottante", "floatVar", $floatVar);

// Fermeture du tableau HTML
echo '</tbody>
    </table>';

// Fonction pour ajouter une ligne au tableau avec les informations de la variable
function addRowToTable($type, $name, $value) {
    echo '<tr>
            <td>' . $type . '</td>
            <td>' . $name . '</td>
            <td>' . $value . '</td>
          </tr>';
}

?>
