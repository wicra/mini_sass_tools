<?php
$servername = "sql.freedb.tech";
$port = '3306';
$dbname = "freedb_outils";
$username = "freedb_wicra";
$password = 'UA3Xjqt$m?NWBFe';

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}

// Fonction pour générer une chaîne aléatoire
function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Nombre de lignes à insérer
$nombreLignes = 10; // Vous pouvez ajuster ce nombre selon vos besoins

// Boucle pour insérer des lignes aléatoires
for ($i = 0; $i < $nombreLignes; $i++) {
    // Générer des valeurs aléatoires
    $name = generateRandomString(10);
    $domaine = generateRandomString(10) . ".com";
    $categorie = rand(1, 5); // Catégorie aléatoire entre 1 et 5
    $description = generateRandomString(20);

    // Requête SQL pour insérer une nouvelle ligne
    $sql = "INSERT INTO `contenue` (`id`, `name`, `domaine`, `categorie`, `description`) 
            VALUES (NULL, '$name', '$domaine', '$categorie', '$description')";

    // Exécution de la requête
    if (mysqli_query($conn, $sql)) {
        echo "Ligne insérée avec succès<br>";
    } else {
        echo "Erreur lors de l'insertion de la ligne : " . mysqli_error($conn) . "<br>";
    }
}

// Fermer la connexion
mysqli_close($conn);
?>
