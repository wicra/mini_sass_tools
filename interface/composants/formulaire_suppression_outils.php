<?php
/////////////////////////////////////////////////////////
//                        SESSION                     //
/////////////////////////////////////////////////////////

session_start();
if (!isset($_SESSION["username"])) {
    header("location: ./connection/formulaire_connection.php");
    exit(); 
}

// déconnexion
if (isset($_GET['logout'])) {
    session_destroy(); 
    header('location: ./connection/formulaire_connection.php');
    exit; 
}

/////////////////////////////////////////////////////////
//                   SUPPRESSION OUTILS               //
/////////////////////////////////////////////////////////

include('./../connection/connection_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_site = htmlspecialchars(trim($_POST["nom_site"])); // Nettoie et récupère le nom du site.
    $user_ajout = htmlspecialchars(trim($_POST["user_ajout"])); // Nettoie et récupère le nom de l'utilisateur.

    // Requête SQL pour supprimer les données de la table 'contenue'.
    $sql = "DELETE FROM `contenue` WHERE `name` = '$nom_site' AND `user_name` = '$user_ajout'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: ./../interface.php");
    } else {
        echo "Erreur lors de la suppression de l'outil.";
    }
}
?>

<form class="formulaire-suppression-outils" action="./composants/formulaire_suppression_outils.php" method="post">
    <p class="heading">Supprimer un outil</p>
    <div class="contener-input">
        <input class="input-ajout" placeholder="Nom du site" type="text" name="nom_site">
        <input class="input-ajout" placeholder="Nom de l'utilisateur" type="text" name="user_ajout">

        <button type="submit" class="btn">SUPPRIMER</button>
    </div>
</form>
