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

        $req = $db->query('SELECT * FROM chapters ORDER BY date_publication DESC');

        $chapters = $req->fetchAll();

        return $chapters;
    }

    // Fonction de récupération d'un chapitre ciblé
    public function getChapter($chapterId)
    {
        // Connexion BDD
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, title, text, author, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr FROM chapters WHERE id = ?');
        $req->execute(array($chapterId));
        $chapter = $req->fetch();

        return $chapter;
    }
}
