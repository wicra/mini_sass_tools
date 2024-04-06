<?php
/////////////////////////////////////////////////////////
//                        SESSION                     //
/////////////////////////////////////////////////////////

session_start();
if(!isset($_SESSION["username"])){
    header("location: ./public/public_page.php");
exit(); 
}

// déconnection
if(isset($_GET['logout'])){
    session_destroy(); 
    header('location: ./connection/formulaire_connection.php');
    exit; 
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        
        <!-- ICON -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- CSS -->
        <link rel="stylesheet" href="./styles/interface.css">

        <!-- FONT -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">

        <!-- AJAX -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar">
                <?php
                    /////////////////////////////////////////////////////////
                    //                   USER CONNECTER                   //
                    /////////////////////////////////////////////////////////
                    include('./connection/connection_db.php');
                    
                    // Assurez-vous que $_SESSION["username"] est protégé contre les injections SQL
                    $username = mysqli_real_escape_string($conn, $_SESSION["username"]);

                    $requete = "SELECT est_admin FROM identifiant WHERE username = '$username'";
                    $result = mysqli_query($conn, $requete);
                    $user_connect =$_SESSION["username"];
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        if ($row['est_admin'] == 1) {
                            echo "
                            <div class=\"user_connecter\" href='#'>
                                <i class=\"fa-solid fa-crown fa-bounce\" style=\"color: #FCDC12;\"></i>
                                <h1>$user_connect</h1>
                            </div> 
                            ";
                            
                        }
                    }
                ?>

                <ul>
                    <!-- ACCUEIL -->
                    <li class="accueil"><a href="#"><i class="fas fa-address-card"></i>ACCUEIL</a></li>
                    <!-- DECONNECTION -->
                    <li><a href="?logout=true"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
                    <!-- AJOUT -->
                    <li class="ajout_outils"><a href="#"><i class="fas fa-address-card"></i>Ajouter</a></li>
                    
                    <!-- MENU DEROULANTE -->
                    <li class="submenu">
                        <a href="#"><i class="fas fa-address-card"></i>Outils</a>
                        <ul class="submenu-content">
                            <li  class="categorie-font"><a href="#" ><i class="fas fa-address-card"></i>Font</a></li>
                            <li  ><a href="#"><i class="fas fa-address-card"></i>Animation</a></li>
                        </ul>
                        <script>
                            /////////////////////////////////////////////////////////
                            //                 SOUS MENU AFFICHAGE                 //
                            /////////////////////////////////////////////////////////
                            document.addEventListener('DOMContentLoaded', function() {
                                const aboutLink = document.querySelector('.submenu > a');
                                const aboutSubMenu = document.querySelector('.submenu-content');
                                aboutLink.addEventListener('click', function(e) {
                                    e.preventDefault(); // Empêche le lien de se comporter normalement
                                    // Si le sous-menu est caché, l'afficher, sinon le cacher
                                    if (aboutSubMenu.style.display === 'none' || aboutSubMenu.style.display === '') {
                                        aboutSubMenu.style.display = 'block';
                                    } else {
                                        aboutSubMenu.style.display = 'none';
                                    }
                                });
                            });
                        </script>
                    </li>
                </ul> 
                <!-- RESEAUX -->
                <div class="social_media">
                    <a class="categorie-font" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <!-- CONTENUE PRINCIPALE -->
            <div class="main_content">
                <!-- HEADER -->
                <div class="header">ICI LE HEADER .</div> 

                <!-- CONTENUE -->
                <section class="outils-contener">
                    <div id="contenue" class="contenue">
                        <!-- Composant ajouter -->
                    </div>
                </section>          
            </div>

            <!-- SCRIPT INCLUDE LE COMPOSANT AU CLICK -->
            <script>
                $(document).ready(function() {
                    /////////////////////////////////////////////////////////
                    //             CHARGEMENT DU CONTENU D'ACCUEIL         //
                    /////////////////////////////////////////////////////////
                    function loadAccueil() {
                        $.ajax({
                            url: './composants/accueil.php',
                            type: 'GET',
                            success: function(response) {
                                $('#contenue').html(response); // Ajoute le contenu
                            },
                            error: function(xhr, status, error) {
                                console.error('Erreur lors du chargement du fichier PHP:', error);
                            }
                        });
                    }
                    loadAccueil();
                    // GESTIONNAIRE D'ÉVÉNEMENT //
                    $('.accueil').click(function() {
                        loadAccueil();
                    });

                    /////////////////////////////////////////////////////////
                    //                   SOUS MENU FRONT                   //
                    /////////////////////////////////////////////////////////
                    $('.categorie-font').click(function() {
                        $.ajax({
                            url: './composants/categorie_font.php',
                            type: 'GET',
                            success: function(response) {
                                $('#contenue').html(response); // Ajoute le contenu
                            },
                            error: function(xhr, status, error) {
                                console.error('Erreur lors du chargement du fichier PHP:', error);
                            }
                        });
                    });

                    /////////////////////////////////////////////////////////
                    //                       MENU AJOUT                    //
                    /////////////////////////////////////////////////////////
                    $('.ajout_outils').click(function() {
                        $.ajax({
                            url: './composants/formulaire_ajout.php',
                            type: 'GET',
                            success: function(response) {
                                $('#contenue').html(response); // Ajoute le contenu 
                            },
                            error: function(xhr, status, error) {
                                console.error('Erreur lors du chargement du fichier PHP:', error);
                            }
                        });
                    });
                });
            </script>
        </div>
    </body>
</html>