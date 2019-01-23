<?php
// On appelle le fichier correspondant
require('Manager.php');

class Chapter extends Manager
{
    // Fonction de récupération de tous les chapitres
    public function getChapters()
    {
        // Connexion BDD
        $db = $this->dbConnect();

        $req = $db->query('SELECT * FROM chapters');

        $chapters = $req->fetchAll();

        return $chapters;
    }

    // Fonction de récupération d'un chapitre ciblé
    public function getChapter()
    {
        // Connexion BDD
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, title, text, author, date_publication, draft FROM chapters WHERE id = ?');
        $req->execute(array($chapterId));
        $chapter = $req->fetch();

        return $chapter;
    }
}
