<?php
// Appel du contrôleur pour charger les fonctions
require('controller/frontoffice.php');
require('controller/backoffice.php');

class Router {
    public function getPage()
    {
        // Affichage de la page d'accueil
        $FOcontroller = new FOController();
        $BOcontroller = new BOController();
        if(!isset($_GET['action'])) {
            $FOcontroller->getHome();
        }
        // Affichage des chapitres
        else if(isset($_GET['action']) && $_GET['action'] == 'romans')
        {
            $FOcontroller->paginationChapters();
        }
        // Affichage des commentaires liés à un chapitre
        else if(isset($_GET['action']) && $_GET['action'] == 'chapter')
        {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                $FOcontroller->listComments();
            }
            else {
                echo 'Erreur de l\'affichage';
            }
        }
        

        else if(isset($_GET['action']) && $_GET['action'] == 'moderer')
        {
            $BOcontroller->moderateCommentControl();
        }

        // Affichage de la page de biographie
        else if(isset($_GET['action']) && $_GET['action'] == 'biography')
        {
            $FOcontroller->myBiography();
        }
        // Affichage de la page des liens
        else if(isset($_GET['action']) && $_GET['action'] == 'links')
        {
            $FOcontroller->myLinks();
        }
        // Affichage de la page de mentions légales
        else if(isset($_GET['action']) && $_GET['action'] == 'mentions')
        {
            $FOcontroller->myMentions();
        }

        // Ajout d'un commentaire
        else if(isset($_GET['action']) && $_GET['action'] == 'addComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $FOcontroller->addCommentControl($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            }
        }
        // Signalement d'un commentaire
        else if(isset($_GET['action']) && $_GET['action'] == 'signaler')
        {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                $FOcontroller->signalCommentControl($_GET['id']);
            }
        }
        // Connexion administrateur
        else if(isset($_GET['action']) && $_GET['action'] == 'connexion') 
        {
            if(!empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['password']) && isset($_POST['password'])) {
                $FOcontroller->connectAdmin();
            }
        }
        else if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {
            // BACK OFFICE
            // Supression d'un chapitre et de ses commentaires
            if(isset($_GET['action']) && $_GET['action'] == 'supprimer')
            {
                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    $BOcontroller->supprChapterControl($_GET['id']);    
                }
            }
            // Modification d'un chapitre
            else if(isset($_GET['action']) && $_GET['action'] == 'modifier') {
                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    $BOcontroller->editionChapters();
                }
            }
            else if(isset($_GET['action']) && $_GET['action'] == 'editer')
                {
                    if(isset($_GET['id']) && $_GET['id'] > 0) {
                        $BOcontroller->editChapterControl($_GET['id']);
                    }
                }
          
            // Ajout d'un chapitre
            else if(isset($_GET['action']) && $_GET['action'] == 'addChapter')
            {
                if (!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['text'])) {
                    $BOcontroller->addChapterControl($_POST['title'], $_POST['text'], $_POST['author']);
                }
                else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            }

            // Suppression d'un commentaire
            else if(isset($_GET['action']) && $_GET['action'] == 'supprComment')
            {
                if(isset($_GET['id']) && $_GET['id'] > 0) {
                    $BOcontroller->supprCommentControl($_GET['id']);
                }
            }

            // Suppression du signalement d'un commentaire
            else if(isset($_GET['action']) && $_GET['action'] == 'unsignal')
            {
                if(isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $BOcontroller->unsignalCommentControl($_GET['id']);
                }
            }
            // Déconnexion de la BDD
            else if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
            {
                $FOcontroller->disconnectAdmin();
            }
        } 
        else {
            header('Location: ./');
        } 
    }
}