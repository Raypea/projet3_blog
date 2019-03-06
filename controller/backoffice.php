<?php
require_once('model/Chapter.php');
require_once('model/Comments.php');
require_once('model/Admin.php');
require_once('Controller.php');

class BOController extends Controller {
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

        $variables = array('moderatedComments' => $moderatedComments, 'pageTitle' => 'Modération');

        $this->composeView('view/backend/moderateView.php', $variables);
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

    public function editionChapters()
    {
        $model = new Chapter();
        $chapter = $model->getChapter($_GET['id']);

        $variables = array('chapter' => $chapter, 'pageTitle' => 'Modifier un chapitre');

        $this->composeView('view/backend/editChapterView.php', $variables);
    }

    // Edition d'un chapitre partie contrôleur
    public function editChapterControl($chapterId)
    {
        $modelEditChapter = new Chapter();

        $editedChapter = $modelEditChapter->editChapter($chapterId);

        if($editedChapter === false)
        {
            die('Impossible d\'éditer le chapitre');
        }
        else
        {
            header('Location: index.php?action=romans');
        }
    }
}