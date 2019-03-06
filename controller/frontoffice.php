<?php
require_once('model/Chapter.php');
require_once('model/Comments.php');
require_once('model/Admin.php');
require_once('Controller.php');

class FOController extends Controller {
    // On récupère la vue de la page d'accueil
    public function getHome()
    {
        $variables = array('pageTitle' => 'Accueil - Jean Forteroche');

        $this->composeView('view/frontend/homeView.php', $variables); 
    }
    // Liste des commentaires
    public function listComments()
    {
        $modelChapter = new Chapter();
        $modelComments = new Comments();
        $chapter = $modelChapter->getChapter($_GET['id']);
        $comments = $modelComments->getComments($_GET['id']);
        // On appelle la vue correspondante

        $variables = array('chapter' => $chapter, 'comments' => $comments, 'pageTitle' => 'Commentaires');

        $this->composeView('view/frontend/commentsView.php', $variables);
    }
    // Page de biographie
    public function myBiography()
    {
        $variables = array('pageTitle' => 'Ma biographie');

        $this->composeView('view/frontend/biographyView.php', $variables);
    }

    // Page de liens
    public function myLinks()
    {
        $variables = array('pageTitle' => 'Mes autres romans');

        $this->composeView('view/frontend/linksView.php', $variables);
    }

    // Page de mentions
    public function myMentions()
    {
        $variables = array('pageTitle' => 'Mentions Légales');

        $this->composeView('view/frontend/mentionsView.php', $variables);
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

    // Signalement de commentaire - partie contrôleur
    public function signalCommentControl($commentId)
    {
        $modelSignaledComment = new Comments();

        $resultSignaledComment = $modelSignaledComment->signalComment($commentId);

        if($resultSignaledComment === false)
        {
            die('Impossible de signaler le commentaire');
        }
        else
        {
            header('Location: index.php?action=romans');
        }
    }

    // PARTIE PAGINATION
    // Fonction pagination - partie contrôleur
    public function paginationChapters()
    {
        $modelPagination = new Chapter();

        $totalChapters = $modelPagination->totalChapters();
        $nbChaptersPerPage = 5;

        $nombrePages = ceil($totalChapters/$nbChaptersPerPage);

        if(isset($_GET['page']) && $_GET['page'] > 0)
        {
            $pageActive = intval($_GET['page']);

            if($pageActive > $nombrePages)
            {
                $pageActive = $nombrePages;
            }
        }
        else
        {
            $pageActive = 1;
        }
        $chapters = $modelPagination->getChaptersByPage($pageActive, $nbChaptersPerPage);

        $variables = array('chapters' => $chapters, 'nombrePages' => $nombrePages, 'pageActive' => $pageActive, 'pageTitle' => 'Chapitres - Page ' .$pageActive);

        $this->composeView('view/frontend/chapterView.php', $variables);
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
            echo "Identifiant ou mot de passe incorrect!";
        }
    }

    // Déconnexion de la BDD - partie contrôleur
    public function disconnectAdmin()
    {
        //session_start();
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

