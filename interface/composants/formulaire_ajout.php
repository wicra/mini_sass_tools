<?php
/////////////////////////////////////////////////////////
//                     AJOUT OUTILS                    //
/////////////////////////////////////////////////////////

include('./../connection/connection_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["nom_site"])); // Nettoie et récupère le nom du site.
    $domaine = htmlspecialchars(trim($_POST["lien_site"])); // Nettoie et récupère le lien du site.
    $description = htmlspecialchars(trim($_POST["description_site"])); // Nettoie et récupère la description.
    $categorie = intval($_POST["categorie"]); // Convertit la valeur de la catégorie en entier.

    // Requête SQL pour insérer les données dans la table 'contenue'.
    $sql = "INSERT INTO `contenue` (`name`, `domaine`, `categorie`, `description`) VALUES ('$name', '$domaine', '$categorie', '$description')";
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
            <option value="1">Font</option>
            <option value="2">Css</option>
            <option value="3">Html</option>
            <option value="4">Js</option>
            <option value="5">Divers</option>
        </select> 

        <button type="submit" class="btn">AJOUTER</button>
    </div>

</form>
