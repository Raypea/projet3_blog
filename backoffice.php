<?php
require_once('model/Chapter.php');

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

    // Edition d'un chapitre partie contrôleur
    public function editChapterControl($chapterId)
    {
        $modelEditChapter = new Chapter();

        $result = $modelEditChapter->editChapter($chapterId);

        if($result === false)
        {
            die('Impossible d\'éditer le chapitre');
        }
        else
        {
            header('Location: index.php?action=romans');
        }
    }
}