<?php

require('model/Chapter.php');

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

    public function chapter()
    {
        $chapter = getChapter($_GET['id']);
        $comments = getComments($_GET['id']);

        // On appelle la vue correspondante
        require('view/frontend/chapterView.php');
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


