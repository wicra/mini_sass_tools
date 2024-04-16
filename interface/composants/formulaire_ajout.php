<?php
/////////////////////////////////////////////////////////
//                        SESSION                     //
/////////////////////////////////////////////////////////

session_start();
if(!isset($_SESSION["username"])){
    header("location: ./connection/formulaire_connection.php");
exit(); 
}

// déconnection
if(isset($_GET['logout'])){
    session_destroy(); 
    header('location: ./connection/formulaire_connection.php');
    exit; 
}

/////////////////////////////////////////////////////////
//                     AJOUT OUTILS                    //
/////////////////////////////////////////////////////////

include('./../connection/connection_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["nom_site"])); // Nettoie et récupère le nom du site.
    $domaine = htmlspecialchars(trim($_POST["lien_site"])); // Nettoie et récupère le lien du site.
    $categorie = intval($_POST["categorie"]); // Convertit la valeur de la catégorie en entier.
    $description = htmlspecialchars(trim($_POST["description_site"])); // Nettoie et récupère la description.
    $user_name = $_SESSION["username"]; // Récupère le nom d'utilisateur de la session

    // Requête SQL pour insérer les données dans la table 'contenue'.
    $sql = "INSERT INTO `contenue` (`name`, `domaine`, `categorie`, `description`, `user_name`) VALUES ('$name', '$domaine', '$categorie', '$description', '$user_name')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: ./../interface.php");
    } else {
        header("location: ./../interface.php");
    }
}
?>

<form class="formulaire-ajout" action="./composants/formulaire_ajout.php" method="post">
    <p class="heading">Ajouter un outil</p>
    <div class="contener-input">
        <input class="input-ajout" placeholder="Nom du site" type="text" name="nom_site">
        <input class="input-ajout" placeholder="Lien du site" type="text" name="lien_site"> 
        <input class="input-ajout" placeholder="Description" type="text" name="description_site">

        <select id="categorie" name="categorie">
            <option value="0">Choisissez une catégorie</option>
            <option value="1">Html</option>
            <option value="2">Css</option>
            <option value="3">Js</option>
            <option value="4">Divers</option>
        </select> 

        <button type="submit" class="btn">AJOUTER</button>
    </div>
</form>
