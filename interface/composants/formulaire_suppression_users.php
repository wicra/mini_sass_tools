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
//               SUPPRESSION UTILISATEUR               //
/////////////////////////////////////////////////////////

include('./../connection/connection_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST["username"])); // Nettoie et récupère le nom d'utilisateur.

    // Requête SQL pour supprimer l'utilisateur de la table 'identifiant'.
    $sql = "DELETE FROM `identifiant` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: ./../interface.php");
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
}
?>

<form class="formulaire-suppression-utilisateurs" action="./composants/formulaire_suppression_users.php" method="post">
    <p class="heading">Supprimer un utilisateur</p>
    <div class="contener-input">
        <input class="input-ajout" placeholder="Nom d'utilisateur" type="text" name="username">

        <button type="submit" class="btn">SUPPRIMER</button>
    </div>
</form>
