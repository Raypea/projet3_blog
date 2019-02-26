    <!-- HEADER PAGE D'ACCUEIL -->
    <?php 
    $pageTitle = 'Accueil - Jean Forteroche';
    include("include/header.php"); ?>
    
    <!-- MENU SCROLL AVEC LA PAGE / HEADER -->
    <?php include("include/nav.php"); ?>

    <?php include("routeur.php");
    $routeur = new Router();
    $routeur->getPage(); ?>

    <!-- FOOTER -->      
    <?php include("include/footer.php"); ?>