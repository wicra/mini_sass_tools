<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Unitools</title>
        
        <!-- ICON -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- CSS -->
        <link rel="stylesheet" href="./interface/styles/public.css">

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
                <div class="user_connecter" href='#'>
                    <i class="fa-solid fa-user-large-slash  style='color: #FCDC12;'"></i>
                    <h1>Public</h1>
                </div> 
                
                <ul>
                    <!-- ACCUEIL -->
                    <li class="accueil"><a href="#"><i class="fa-solid fa-house"></i><span>Accueil</span> </a></li>
                    <!-- CONNECTION -->
                    <li class="connection"><a href="#"><i class="fa-solid fa-right-to-bracket"></i><span>Connection</span> </a></li>

                </ul> 
                <!-- RESEAUX -->
                <div class="social_media">
                    <a href="https://github.com/wicra"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>

            <!-- CONTENUE PRINCIPALE -->
            <div class="main_content">
                <!-- HEADER -->
                <div class="header">
                    <h3>Connectez-vous pour avoir accès</h3>
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
                    //             CHARGEMENT DU CONTENU D'ACCUEIL         //
                    /////////////////////////////////////////////////////////
                    function loadAccueil() {
                        $.ajax({
                            url: './interface/composants/accueil.php',
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
                    $('.connection').click(function() {
                        $.ajax({
                            url: './interface/composants/formulaire_connection.php',
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