<?php

require('../model/frontoffice.php');

class Chapters {
    public function listChapters()
    {
        $chapters = getChapters();

        // On appelle la vue correspondante
        require('../view/frontend/listChaptersView.php');
    }

    public function chapter()
    {
        $chapter = getChapter($_GET['id']);
        $comments = getComments($_GET['id']);

        // On appelle la vue correspondante
        require('../view/frontend/chapterView.php');
    }

    // Ajout de commentaire - partie contrôleur
    public function addComment($chapterId, $author, $comment)
    {
        $affectedLines = addComment($chapterId, $author, $comment);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=chapter&id=' . $chapterId);
        }
    }
}


class Connexion { 
    public function Verification() {
        if(!empty($_POST['email']) && isset($_POST['email']) && !empty($_POST['password']) && isset($_POST['password']))
        {
            $sql = "SELECT id, login, email, firstname, lastname, date_creation, id_groupe FROM users WHERE email = :email";
            
            $query = $db -> prepare($sql);
            $query -> bindValue(":email", $_POST['email'], PDO::PARAM_STR);
            $query -> execute();

            $password_bdd = $query -> fetch();

            if (!empty($password_bdd) AND sha1($_POST['password']) === $password_bdd['password']){

            // Démarrage de session
            session_start();
            $_SESSION['id'] = htmlentities($password_bdd['id']);
            $_SESSION['login'] = htmlentities($password_bdd['login']);
            $_SESSION['email'] = htmlentities($password_bdd['email']);
            $_SESSION['firstname'] = htmlentities($password_bdd['firstname']);
            $_SESSION['lastname'] = htmlentities($password_bdd['lastname']);

            header("Location: ../index.php");
            }
            else
            {
                header("Location: ../index.php");
            }
        }
        else
        {
            
        }
    }
}

