<!-- Menu de navigation -->
<nav class="navbar navbar-expand-lg navbar-fixed-top navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Jean Forteroche</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=romans">Chapitres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=biography">Biographie</a>
                </li>
            </ul>
            <?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
            <span class="navbar-text text-white">Vous êtes connecté en tant qu'administrateur</span>
            <?php } ?>
        </div>
    </div>
</nav>