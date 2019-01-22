<!-- Ajout d'un commentaire -->
<div class="container mt-5 mb-5">
    <h3 class="text-uppercase">Ajouter un commentaire</h3>
    <form action="romans.php?action=addComment&amp;id=<?= $chapterId['id'] ?>" method="post">
        <div class="form-group">
            <input type="text" id="author" name="author" class="form-control" placeholder="Votre pseudo">
        </div>

        <div class="form-group">
            <textarea name="comment" id="comment" cols="40" rows="5" class="form-control" placeholder="Votre commentaire"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>
