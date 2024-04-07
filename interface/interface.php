<?php
/////////////////////////////////////////////////////////
//                        SESSION                     //
/////////////////////////////////////////////////////////

session_start();
if(!isset($_SESSION["username"])){
    header("location: ./../index.php");
exit(); 
}

// déconnection
if(isset($_GET['logout'])){
    session_destroy(); 
    header('location: ./../index.php');
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
                        else{
                            echo "
                            <div class=\"user_connecter\" href='#'>
                                <i class=\"fa-solid fa-user  fa-bounce\" style=\"color: #FCDC12;\"></i>
                                <h1>$user_connect</h1>
                            </div> 
                            ";
                        }
                    }
                ?>

                <ul>
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
                                echo '<!-- ACCUEIL -->
                                <li class="accueil"><a href="#"><i class="fa-solid fa-house"></i><span>Accueil</span></a></li>
                                
                                <!-- DECONNEXION -->
                                <li><a href="?logout=true"><i class="fa-solid fa-right-from-bracket"></i><span>Déconnexion</span></a></li>
                                
                                <!-- AJOUT OUTILS -->
                                <li class="ajout_outils"><a href="#"><i class="fa-solid fa-circle-plus"></i><span>Ajouter Outils</span></a></li>
                                
                                <!-- AJOUT UTILISATEURS -->
                                <li class="ajout_utilisateurs"><a href="#"><i class="fa-solid fa-user-plus"></i><span>Ajouter User</span></a></li>
                                
                                <!-- SUPPRESSION OUTILS -->
                                <li class="suppression_outils"><a href="#"><i class="fa-solid fa-trash"></i><span>Supprimer Outils</span></a></li>
                                
                                <!-- SUPPRESSION UTILISATEURS -->
                                <li class="suppression_utilisateurs"><a href="#"><i class="fa-solid fa-ban"></i><span>Supprimer User</span></a></li>
                                
                                <!-- MENU DEROULANT -->
                                <li class="submenu">
                                    <a href="#"><i class="fa-solid fa-toolbox"></i>Outils</a>
                                    <ul class="submenu-content">
                                        <li class="categorie-html"><a href="#"><i class="fa-brands fa-html5"></i>Html</a></li>
                                        <li class="categorie-css"><a href="#"><i class="fa-brands fa-css3-alt"></i>Css</a></li>
                                        <li class="categorie-js"><a href="#"><i class="fa-brands fa-js"></i>Js</a></li>
                                        <li class="categorie-divers"><a href="#"><i class="fa-solid fa-border-all"></i>Divers</a></li>
                                    </ul>
                                    <script>
                                        // SOUS-MENU AFFICHAGE
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const aboutLink = document.querySelector(".submenu > a");
                                            const aboutSubMenu = document.querySelector(".submenu-content");
                                            aboutLink.addEventListener("click", function(e) {
                                                e.preventDefault(); // Empêche le lien de se comporter normalement
                                                if (aboutSubMenu.style.display === "none" || aboutSubMenu.style.display === "") {
                                                    aboutSubMenu.style.display = "block";
                                                } else {
                                                    aboutSubMenu.style.display = "none";
                                                }
                                            });
                                        });
                                    </script>
                                </li>';

                                
                                
                            }
                            else{
                                echo '
                                <!-- ACCUEIL -->
                                <li class="accueil"><a href="#"><i class="fa-solid fa-house"></i><span>Accueil</span></a></li>
                                
                                <!-- DECONNEXION -->
                                <li><a href="?logout=true"><i class="fa-solid fa-right-from-bracket"></i><span>Déconnexion</span></a></li>
                                
                                <!-- AJOUT OUTILS -->
                                <li class="ajout_outils"><a href="#"><i class="fa-solid fa-circle-plus"></i><span>Ajouter Outils</span></a></li>
                                
                                <!-- MENU DEROULANT -->
                                <li class="submenu">
                                    <a href="#"><i class="fa-solid fa-toolbox"></i>Outils</a>
                                    <ul class="submenu-content">
                                        <li class="categorie-html"><a href="#"><i class="fa-brands fa-html5"></i>Html</a></li>
                                        <li class="categorie-css"><a href="#"><i class="fa-brands fa-css3-alt"></i>Css</a></li>
                                        <li class="categorie-js"><a href="#"><i class="fa-brands fa-js"></i>Js</a></li>
                                        <li class="categorie-divers"><a href="#"><i class="fa-solid fa-border-all"></i>Divers</a></li>
                                    </ul>
                                    <script>
                                        // SOUS-MENU AFFICHAGE
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const aboutLink = document.querySelector(".submenu > a");
                                            const aboutSubMenu = document.querySelector(".submenu-content");
                                            aboutLink.addEventListener("click", function(e) {
                                                e.preventDefault(); // Empêche le lien de se comporter normalement
                                                if (aboutSubMenu.style.display === "none" || aboutSubMenu.style.display === "") {
                                                    aboutSubMenu.style.display = "block";
                                                } else {
                                                    aboutSubMenu.style.display = "none";
                                                }
                                            });
                                        });
                                    </script>
                                </li>';
                            }
                        }
                    ?>
                </ul> 
                <!-- RESEAUX -->
                <div class="social_media">
                    <a class="categorie-font" href="https://github.com/wicra"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>
            
            <!-- CONTENUE PRINCIPALE -->
            <div class="main_content">
                <!-- HEADER -->
                <div class="header">
                    <i style="font-size:25px; padding:0 2vw 0 1vw;" id="toggleSidebar" class="fa-solid fa-bars-staggered"></i>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const sidebar = document.querySelector('.sidebar');
                            const mainContent = document.querySelector('.main_content');
                            const toggleButton = document.getElementById('toggleSidebar');

                            // CSS directement dans le JavaScript
                            const css = `
                                .sidebar {
                                    /* Vos styles de sidebar ici */
                                }
                                .hidden {
                                    display: none;
                                }
                            `;

                            // Créer un élément style et ajouter le CSS
                            const style = document.createElement('style');
                            style.textContent = css;
                            document.head.appendChild(style);

                            toggleButton.addEventListener('click', function() {
                                sidebar.classList.toggle('hidden');
                                // Modifier le style de .main_content lorsque le bouton est cliqué
                                if (sidebar.classList.contains('hidden')) {
                                    mainContent.style.marginLeft = '0';
                                } else {
                                    mainContent.style.marginLeft = '200px';
                                }
                            });
                        });
                    </script>

                    <div id="recherche">
                        <form class="form-recherche" action="./composants/categorie_rechercher.php" method="post">
                            <button>
                                <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
                                    <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                            <input class="input" placeholder="Recherche" required="" type="text" name= "recherche">
                            <button class="reset" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div> 

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
                    //                  RESULTA RECHERCHE                  //
                    /////////////////////////////////////////////////////////
                    
                    $(document).ready(function() {
                        $('.form-recherche').submit(function(event) {
                            event.preventDefault(); // Empêche le formulaire de se soumettre normalement
                            
                            var recherche = $(this).find('input[name="recherche"]').val(); // Récupère la valeur de l'input de recherche
                            
                            $.ajax({
                                url: './composants/categorie_rechercher.php',
                                type: 'POST',
                                data: { recherche: recherche }, // Envoie le terme de recherche au script PHP
                                success: function(response) {
                                    $('#contenue').html(response); // Ajoute le contenu
                                },
                                error: function(xhr, status, error) {
                                    console.error('Erreur lors du chargement du fichier PHP:', error);
                                }
                            });
                        });
                    });

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
                    //                    MENU AJOUT OUTILS                //
                    /////////////////////////////////////////////////////////
                    $('.ajout_utilisateurs').click(function() {
                        $.ajax({
                            url: './composants/formulaire_inscription.php',
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
                    //                   MENU AJOUT USER                   //
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
                    /////////////////////////////////////////////////////////
                    //               MENU SUPPRESSION OUTILS               //
                    /////////////////////////////////////////////////////////
                    $('.suppression_outils').click(function() {
                        $.ajax({
                            url: './composants/formulaire_suppression_outils.php',
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
                    //                 MENU SUPPRESSION USER               //
                    /////////////////////////////////////////////////////////
                    $('.suppression_utilisateurs').click(function() {
                        $.ajax({
                            url: './composants/formulaire_suppression_users.php',
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
                    //                   SOUS MENU HTML                    //
                    /////////////////////////////////////////////////////////
                    $('.categorie-html').click(function() {
                        $.ajax({
                            url: './composants/categorie_html.php',
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
                    //                   SOUS MENU CSS                   //
                    /////////////////////////////////////////////////////////
                    $('.categorie-css').click(function() {
                        $.ajax({
                            url: './composants/categorie_css.php',
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
                    //                   SOUS MENU JS                   //
                    /////////////////////////////////////////////////////////
                    $('.categorie-js').click(function() {
                        $.ajax({
                            url: './composants/categorie_js.php',
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
                    //                   SOUS MENU DIVERS                   //
                    /////////////////////////////////////////////////////////
                    $('.categorie-divers').click(function() {
                        $.ajax({
                            url: './composants/categorie_divers.php',
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