<?php
// Appel du contrôleur pour charger les fonctions
require('controller/frontoffice.php');
class Router {
    public function getPage()
    {
        // Affichage de la page d'accueil
        $FOcontroller = new FOController();
        if(!isset($_GET['action'])) {
            $FOcontroller->getHome();
        }
        // Affichage des chapitres
        else if(isset($_GET['action']) && $_GET['action'] == 'romans')
        {
            $FOcontroller->listChapters();
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
        // Ajout d'un chapitre
        else if(isset($_GET['action']) && $_GET['action'] == 'addChapter')
        {
            if (!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['text'])) {
                $FOcontroller->addChapterControl($_POST['title'], $_POST['text'], $_POST['author']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }


        // Affichage de la page de biographie
        else if(isset($_GET['action']) && $_GET['action'] == 'biography')
        {
            $FOcontroller->myBiography();
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
        else if(isset($_GET['action']) && $_GET['action'] == 'connexion') 
        {
            if(!empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['password']) && isset($_POST['password'])) {
                $FOcontroller->connectAdmin();
            }
        }

        else {
            header('Location: ./');
        }
    }
}