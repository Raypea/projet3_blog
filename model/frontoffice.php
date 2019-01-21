<?php

class Chapter extends Manager
{
    // Fonction de récupération de plusieurs chapitres (par exemple les plus récents)
    public function getChapters()
    {
        // Connexion BDD
        $db = dbConnect();

        $req = $db->query('SELECT id, title, text, author, date_publication, draft FROM chapters ORDER BY date_publication DESC LIMIT 0, 5'); 

        return $req;
    }

    // Fonction de récupération d'un chapitre ciblé
    public function getChapter()
    {
        // Connexion BDD
        $db = dbConnect();

        $req = $db->prepare('SELECT id, title, text, author, date_publication, draft FROM chapters WHERE id = ?');
        $req->execute(array($chapterId));
        $chapter = $req->fetch();

        return $chapter;
    }
}

class Comments extends Chapter 
{
    // Fonction de sélection des commentaires
    public function getComments($chapterId)
    {
        // Connexion BDD
        $db = dbConnect();
        
        $comments = $db->prepare('SELECT id, chapter_id, author, comment, comment_date, signalement_date FROM comments WHERE chapter_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($chapterId));

        return $comments;
    }
}