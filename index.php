    <?php session_start(); ?>
    
    <!-- HEADER PAGE D'ACCUEIL -->
    <?php 
    $pageTitle = 'Accueil - Jean Forteroche';?>
  

    <?php include("routeur.php");
    $routeur = new Router();
    $routeur->getPage(); ?>

