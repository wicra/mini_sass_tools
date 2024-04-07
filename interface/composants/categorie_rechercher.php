<?php
/////////////////////////////////////////////////////////
//                     RECHERCHE                      //
/////////////////////////////////////////////////////////
include('./../connection/connection_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recherche = htmlspecialchars(trim($_POST["recherche"])); // Nettoie et récupère le terme de recherche.
    // Requête SQL pour rechercher dans la table 'contenue' les lignes où le nom correspond ou contient le terme de recherche.
    $sql = "SELECT * FROM `contenue` WHERE `name` LIKE '%$recherche%'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Affichage des résultats
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class=\"outils\">
                    <div class=\"nom-site\">
                        <a href='" . $row['domaine'] . "' target='_blank'>" . $row['name'] . "</a> 
                    </div>
                    <div class=\"description\">
                        <h4>" . $row['description'] . "</h4>
                        <h5>" . $row['user_name'] . "</h5>
                    </div>
                </div>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
}
?>
