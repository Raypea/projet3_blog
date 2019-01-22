<!-- HEADER PAGE D'ACCUEIL -->
<?php 
    $pageTitle = 'Romans - Jean Forteroche';
    include("include/header.php"); ?>

    <!-- MENU SCROLL AVEC LA PAGE / HEADER -->
    <?php include("include/nav.php"); ?>

     <!-- LISTE DES ROMANS -->
     <?php include("view/frontend/chapterView.php"); ?> 

    <!-- AJOUT DE COMMENTAIRES --> 
    <?php include("view/frontend/addCommentView.php"); ?>

    <!-- FOOTER -->      
    <?php include("include/footer.php"); ?>