<?php
/////////////////////////////////////////////////////////
//                        SESSION                     //
/////////////////////////////////////////////////////////

session_start();
// Verif si user connecter si la variable $_SESSION comptien le username 
if(!isset($_SESSION["username"])){
    header("location: ./connection/formulaire_connection.php");
exit(); 
}

// déconnection
if(isset($_POST['deconnection'])){
    session_destroy();
    header('location: ./connection/formulaire_connection.php');
}

/////////////////////////////////////////////////////////
//         CONDITION AJOUT UTILISATEUR & ADMIN         //
/////////////////////////////////////////////////////////

include('./../connection/connection_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars(trim($_POST["username"])); // Nettoie et récupère le nom d'utilisateur.
    $password = sha1(htmlspecialchars(trim($_POST["password"]))); // Nettoie et récupère le mot de passe crypté
    $estAdmin = isset($_POST["estAdmin"]) ? 1 : 0; // Vérifie si l'utilisateur est un administrateur

    // Requête SQL pour insérer l'utilisateur dans la table identifiant.
    $sql = "INSERT INTO identifiant (username, password, est_admin) VALUES ('$username', '$password', $estAdmin)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // L'utilisateur a été ajouté avec succès
        header("location: ./../interface.php");
        exit();
    } else {
        // Une erreur s'est produite lors de l'ajout de l'utilisateur
        echo "Erreur : " . mysqli_error($conn);
        exit();
    }
}
?>

<form class="formulaire-inscription" action="./composants/formulaire_inscription.php" method="post">
    <div class="login-box">
        <h1>Inscription</h1>

        <div class="textbox">
            <i class="fa-solid fa-user"></i>
            <input class="input-inscription" type="text" placeholder="Nom d'utilisateur" name="username" required>
        </div>

        <div class="textbox">
            <i class="fa-solid fa-lock"></i>
            <input class="input-inscription" type="password" placeholder="Mot de passe" name="password" required>
        </div>
        
        <div class="textbox">
            <label class="custom-checkbox">
                <input class="input-inscription" id="estAdmin" name="estAdmin" type="checkbox">
                <span class="checkmark"></span>
            </label>      
            <label for="estAdmin">Admin</label>
        </div>

        <input class="button-inscription" type="submit" name="login" value="Inscription">

        <!-- 
        <div class="lien-connection">
            <a href="./../../index.php"><i class="fa-solid fa-circle-arrow-left"></i></a>					
            <a href="formulaire_connection.php">se connecter</a>					
        </div>-->
    </div>
</form>

