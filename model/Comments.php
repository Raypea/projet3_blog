<?php
require('Chapter.php');

class Comments extends Chapter 
{
    // Fonction de sélection des commentaires
    public function getComments($chapterId)
    {
        // Connexion BDD
        $db = $this->dbConnect();
        
        $comments = $db->prepare('SELECT id, chapter_id, author, comment, comment_date, signalement_date FROM comments WHERE chapter_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($chapterId));

        return $comments;
    }

    // Fonction d'ajout de commentaires
    public function addComment()
    {
        // Connexion BDD
        $db = $this->dbConnect();

        $comments = $db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date, signalement_date)
        VALUES(?, ?, ?, NOW(), ?)');
        $affectedLines = $comments->execute(array($chapterId, $author, $comment));

        return $affectedLines;
    }
}