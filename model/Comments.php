<?php
require_once('Manager.php');
class Comments extends Manager 
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

    // Fonction d'affichage des commentaires signalés
    public function moderateComments()
    {
        // Connexion BDD
        $db = $this->dbConnect();

        $req = $db->query('SELECT * FROM comments WHERE signalement > 0 ORDER BY signalement DESC, signalement_date DESC');
        $moderatedComments = $req->fetchAll();
        return $moderatedComments;
    }

    // Fonction d'ajout de commentaires
    public function addComment($chapterId, $author, $comment)
    {
        // Connexion BDD
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date)
        VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($chapterId, $author, $comment));
        return $affectedLines;
    }

    // Fonction de suppression d'un commentaire
    public function supprComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deletedComment = $req->execute(array($commentId));
        return $deletedComment;
    }

    // Fonction de signalement de commentaires
    public function signalComment($commentId)
    {
        // Connexion BDD
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET signalement = signalement+1, signalement_date = NOW() WHERE id = ?');
        $signaledComment = $req->execute(array($commentId));
        return $signaledComment;
    }

    // Fonction de suppression d'un signalement de commentaire
    public function unsignalComment($commentId)
    {
        // Connexion BDD
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET signalement = NULL, signalement_date = NULL WHERE id = ?');
        $unsignaledComment = $req->execute(array($commentId));
        return $unsignaledComment;
    }
}