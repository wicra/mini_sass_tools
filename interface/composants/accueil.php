
<!-- ACCUEIL -->
<div class="welcome">
    <div id="message" class="message">
        <h1>Bienvenue sur ReuniTools  </h1>
        <h3>le site qui reuni tout les outils pour les dev</h3>
        <h4>Utilisez le et partager vos meilleurs outils</h4>
    </div>

    <!-- SCRIPT DE MASQUAGE ACCUEIL -->
    <script>
        var connectionLink = document.getElementById('declanche_masquage_accueil');

        // Ajoutez un gestionnaire d'événement clic au lien de connexion
        connectionLink.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien
            var bienvenueDiv = document.querySelector('.welcome');
            bienvenueDiv.style.display = 'none'; // Masque la div bienvenue
        });
    </script>
</div>