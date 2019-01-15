
<h2>Commentaires</h2>

<!-- Ajout d'un commentaire -->
<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br>
        <input type="text" id="author" name="author">
    </div>

    <div>
        <label for="comment">Commentaire</label><br>
        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    </div>

    <div>
        <input type="submit">
    </div>
</form>