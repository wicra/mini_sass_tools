<?php
include('./../connection/connection_db.php');
// Requête SQL pour récupérer les lignes avec la catégorie 1
$sql = "SELECT name, domaine, description FROM contenue WHERE categorie = 4";

// Exécution de la requête
$resultat = mysqli_query($conn, $sql);

// Vérifier s'il y a des résultats
if ($resultat) {
    // Afficher les données
    while ($row = mysqli_fetch_assoc($resultat)) {
        echo "<div class=\"outils\">
                <div class=\"nom-site\">
                    <a href='" . $row['domaine'] . "' target='_blank'>" . $row['name'] . "</a>
                </div>
                <div class=\"description\">
                    <h4>" . $row['description'] . "</h4>
                </div>
            </div>";
    }
} else {
    echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
}

// Fermer la connexion
mysqli_close($conn);
?>
