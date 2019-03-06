<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <link rel="stylesheet" href="public/css/style.css">
        <title><?php echo ($pageTitle); ?></title>
        <?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
        <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        <?php } ?>
    </head>

    <body>
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
                            <a class="nav-link" href="index.php?action=romans">Mon Roman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=biography">Ma Biographie</a>
                        </li>
                        <li>
                            <a class="nav-link" href="index.php?action=links">Liens</a>
                        </li>
                        <?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=moderer">Modération</a>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
                    <span class="navbar-text text-white">Vous êtes connecté en tant qu'administrateur</span>
                    <?php } ?>
                </div>
            </div>
        </nav>

        <?= $mainContent ?>

        <footer class="page-footer bg-dark pt-4">
            <div class="container text-center text-white text-md-left">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3">
                        <h5 class="text-uppercase">Retrouvez mes réseaux sociaux</h5>
                        <a href="#"><i class="fab fa-facebook fa-2x text-white p-2"></i></a>
                        <a href="#"><i class="fab fa-linkedin fa-2x text-white p-2"></i></a>
                        <a href="#"><i class="fab fa-twitter fa-2x text-white p-2"></i></a>
                        <p>Blog de Jean Forteroche</p>
                    </div>
                    <ul class="nav justify-content-center">
                        <?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
                            <li class="nav-item"><a class="nav-link text-white" href="index.php?action=deconnexion">Déconnexion</a></li>
                        <?php }  else  { ?>
                            <li class="nav-item"><a class="nav-link" style="cursor:pointer" data-toggle="modal" data-target="#connexionsmodal">Connexion administrateur</a></li>
                        <?php  }  ?>
                    </ul>
                </div>
                <?php include("include/modal_connexion.php") ?>
            </div>

            <div class="footer-copyright text-center text-white py-3">
                <a href="index.php?action=mentions"><p>Mentions légales</p></a>
                © 2019 copyright
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>