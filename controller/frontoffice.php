<?php
require_once('model/Chapter.php');
require_once('model/Comments.php');
require_once('model/Admin.php');

class FOController {
    // On récupère la vue de la page d'accueil
    public function getHome()
    {
        include("view/frontend/homeView.php"); 
    }
    // Liste des chapitres
    public function listChapters()
    {
        $model = new Chapter();
        $chapters = $model->getChapters();
        // On appelle la vue correspondante
        require('view/frontend/chapterView.php');
    }
    // Liste des commentaires
    public function listComments()
    {
        $modelChapter = new Chapter();
        $modelComments = new Comments();
        $chapter = $modelChapter->getChapter($_GET['id']);
        $comments = $modelComments->getComments($_GET['id']);
        // On appelle la vue correspondante
        require('view/frontend/commentsView.php');
    }
    // Page de biographie
    public function myBiography()
    {
        require('view/frontend/biographyView.php');
    }

    // Ajout de commentaire - partie contrôleur
    public function addCommentControl($chapterId, $author, $comment)
    {
        $modelAddComment = new Comments();
        $affectedLines = $modelAddComment->addComment($chapterId, $author, $comment);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=chapter&id=' . $chapterId);
        }
    }

    // Ajout de chapitre - partie contrôleur
    public function addChapterControl($title, $text, $author)
    {
        $modelAddChapter = new Chapter();
        $result = $modelAddChapter->addChapter($title, $text, $author);

        if ($result === false) {
            die('Impossible d\'ajouter le chapitre !');
        }
        else {
            header('Location: index.php?action=romans');
        }
    }

    // Connexion à la BDD - partie contrôleur
    public function connectAdmin()
    {
        $modelAdmin = new Admin();

        $result = $modelAdmin->Connexion();

        // Affichage des erreurs
        if(!empty($result))
        {
                $_SESSION['id'] = htmlentities($result['id']);
                $_SESSION['email'] = htmlentities($result['email']);
                header("Location: index.php");
        }
        else 
        {
            header("Location: index.php");
        }
    }

    // Déconnexion de la BDD - partie contrôleur
    public function disconnectAdmin()
    {
        session_start();
        if (isset($_SESSION["id"]))
        {
            session_unset();
            header("Location: index.php");
        }
        else
        {
            echo "<p> Vous cherchez à vous déconnecter sans être connecté, c'est étonnant </p>";
        }

        session_destroy();

        setcookie('email', '');
        setcookie('password', '');
    }
}

