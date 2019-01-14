<?php

// Fonction d'ajout de commentaires côté contrôleur
function addComment($postId, $author, $comment)
{
    // On stocke le commentaire dans une variable pour contrôler le nombre de lignes affectées.
    $affectedLines = postComment($postId, $author, $comment);

    // Test s'il y a une erreur
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    // On redirige le visiteur vers la page de publication de son commentaire.
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}