<!-- Menu de navigation -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Jean Forteroche</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profil</a>
                </li>
                <li class="nav-item">
                    <!-- Si l'utilisateur est connecté en tant qu'admin alors on affiche "Administration" -->
                    <?php if (isset($_SESSION["admin"]) AND $_SESSION["admin"] = 1 ){ ?>
                    <a class="nav-link" href="#">Administration</a>
                </li>
                    <?php } ?>
            </ul>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Inscription</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Connexion</a>
                </li>
            </ul>
            <span class="navbar-text">
                Billet simple pour l'Alaska
            </span>
        </div>
    </div>
</nav>