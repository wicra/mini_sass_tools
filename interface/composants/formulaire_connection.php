<?php
/////////////////////////////////////////////////////////
//                     AJOUT OUTILS                    //
/////////////////////////////////////////////////////////

include('./../connection/connection_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	session_start();

	if (!isset($_SESSION['est_admin'])) {
		$_SESSION['count'] = 0;
	} else {
		$_SESSION['count']++;
	}

    $username = htmlspecialchars(trim($_POST["username"])); // Nettoie et récupère le nom d'utilisateur.
    $password = sha1(htmlspecialchars(trim($_POST["password"]))); // Nettoie et récupère le mot de pass cripté

    // Requête SQL pour vérifier l'utilisateur dans la table identifiant.
	$sql = "SELECT * FROM identifiant WHERE username = '$username' AND password = '$password'";
	$result  = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
		$user = mysqli_fetch_assoc($result);

		$_SESSION['username'] = $username ;
		$_SESSION['password'] = $password ;
		
		header("location: ./../interface.php");
        exit(); 
    } else {
        header("location: ./../../index.php");
        exit(); 
    };
}
?>

<style>
/* FOMRULAIRE CONNECTION  */

.formulaire-connection{
    padding: 20vh 0;
}

.input-connection:focus { /*Couleur de la valeur saisie*/
	color: #4b4276;
}

.textbox .input-connection  {
	border: none;
	outline: none;
	background: none;
	font-size: 18px;
	float: left;
	margin: 0 10px;
}

.button-connection {
	width: 100%;
    padding: 2vh 1vw;
    border: none;
    border-radius: 0.4rem;
    background-color: #4b4276;
    color: white;
}

.button-connection:active {
	transition: 0.3s;
    transform: scale(0.93);
}
</style>


<form class="formulaire-connection" action="./interface/composants/formulaire_connection.php" method="post">
    <div class="login-box">
        <h1>Se connecter</h1>

        <div class="textbox">
            <i class="fa-solid fa-user"></i>
            <input class="input-connection" type="text" placeholder="Nom d'utilisateur" name="username" value="">
        </div>

        <div class="textbox">
            <i class="fa-solid fa-lock"></i>
            <input class="input-connection" type="password" placeholder="Mot de passe" name="password" value="">
        </div>

        <input  class="button-connection" type="submit" name="login" value="Connection">

        <!-- 
        <div class="lien-inscription">
            <a href="./../../index.php"><i class="fa-solid fa-circle-arrow-left"></i></a>					
            <a href="formulaire_inscription.php">crée un compte</a>					
        </div>-->
    </div>
</form>


