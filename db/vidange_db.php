<?php
// Inclure le fichier de connexion à la base de données
include('./../interface/connection/connection_db.php');

// Nom de la table à vider
$table_name = 'contenue';

// Requête SQL pour vider la table
$sql = "TRUNCATE TABLE $table_name";

// Exécution de la requête
if (mysqli_query($conn, $sql)) {
    echo "La table $table_name a été vidée avec succès.";
} else {
    echo "Erreur : Impossible de vider la table $table_name. " . mysqli_error($conn);
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
