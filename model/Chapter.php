<?php
// On appelle le fichier correspondant
require_once('Manager.php');
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
    // Fonction d'ajout d'un chapitre dans la base de données
    public function addChapter($title, $text, $author)
    {
        $db = $this->dbConnect();
        $newChapter = $db->prepare('INSERT INTO chapters(title, text, author, date_publication) VALUES(?, ?, ?, NOW())');
        $result = $newChapter->execute(array($title, $text, $author));
        return $result;
    }
    // Fonction de suppression d'un chapitre dans la base de données
    public function supprChapter($chapterId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM chapters WHERE id = ?');
        $deletedChapter = $req->execute(array($chapterId));
        return $deletedChapter;
    }
    // Fonction d'édition d'un chapitre dans la base de données
    public function editChapter($chapterId)
    {
        $title = $_POST['title'];
        $text = $_POST['text'];

        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE chapters SET title = :title, text = :text WHERE id = ?');
        $editedChapter = $req->execute(array($chapterId, 'title' => $title, 'text' => $text));
         
        return $editedChapter;
    }
    // Fonction de pagination des chapitres
    public function pageChapter()
    {
        // Connexion BDD
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT COUNT(*) AS nb_pages FROM chapters');
        $total = $req->fetch();
        $nb_pages = $total['nb_pages'];

        
    }
}