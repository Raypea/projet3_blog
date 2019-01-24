<?php

require('model/Comments.php');

class FOController {
    // On récupère la vue de la page d'accueil
    public function getHome()
    {
        include("view/frontend/homeView.php"); 
    }

    public function listChapters()
    {
        $model = new Chapter();
        $chapters = $model->getChapters();

        // On appelle la vue correspondante
        require('view/frontend/chapterView.php');
    }

    public function listComments()
    {
        $modelChapter = new Chapter();
        $modelComments = new Comments();
        $chapter = $modelChapter->getChapter($_GET['id']);
        $comments = $modelComments->getComments($_GET['id']);

        // On appelle la vue correspondante
        require('view/frontend/commentsView.php');
    }


    // Ajout de commentaire - partie contrôleur
    public function addComment($chapterId, $author, $comment)
    {
        $affectedLines = addComment($chapterId, $author, $comment);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: romans.php?action=chapter&id=' . $chapterId);
        }
    }
}


