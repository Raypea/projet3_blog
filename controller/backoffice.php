<?php
require_once('model/Chapter.php');
require_once('model/Comments.php');
require_once('model/Admin.php');

class BOController {
    // Suppression d'un chapitre partie contrôleur
    public function supprChapterControl($chapterId)
    {
        $modelSupprChapter = new Chapter();
        $result = $modelSupprChapter->supprChapter($chapterId);

        if($result === false)
        {
            die('Impossible de supprimer le chapitre');
        }
        else 
        {
            header('Location: index.php?action=romans');
        }
    }

    // Modération de commentaires partie contrôleur
    public function moderateCommentControl()
    {
        $modelModerateComment = new Comments();
 
        $moderatedComments = $modelModerateComment->moderateComments();

        require('view/backend/moderateView.php');
    }

    // Suppression d'un signalement de commentaire - partie contrôleur
    public function unsignalCommentControl($commentId)
    {
        $modelUnsignaledComment = new Comments();

        $resultUnsignaledComment = $modelUnsignaledComment->unsignalComment($commentId);

        if($resultUnsignaledComment === false)
        {
            die('Impossible d\'enlever le signalement du commentaire');
        }
        else
        {
            header('Location: index.php?action=moderer');
        }
    }

    // Suppression d'un commentaire partie contrôleur
    public function supprCommentControl($commentId)
    {
        $modelSupprComment = new Comments();

        $resultComment = $modelSupprComment->supprComment($commentId);

        if($resultComment === false)
        {
            die('Impossible de supprimer le commentaire');
        }
        else
        {
            header('Location: index.php?action=romans');
        }
    }

    // Edition d'un chapitre partie contrôleur
    public function editChapterControl($chapterId)
    {
        $modelEditChapter = new Chapter();

        $resultChapter = $modelEditChapter->editChapter($chapterId);

        if($resultChapter === false)
        {
            die('Impossible d\'éditer le chapitre');
        }
        else
        {
            header('Location: index.php?action=romans');
        }
    }
}