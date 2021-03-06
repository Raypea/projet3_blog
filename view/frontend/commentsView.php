<!-- Affichage du chapitre --> 
<div class="container mt-5 mb-5">
    <h2 class="text-uppercase"> <?php  echo $chapter["title"]."</br>"; ?></h2>
    <p class="mb-0"> <?php  echo $chapter["content"]."<br>"; ?></p>
    <a href="index.php?action=romans"><button class="btn btn-primary">Revenir à la liste des chapitres</button></a>
</div>

<!-- Affichage des commentaires --> 
<div class="container mt-5 mb-5">
    <h2 class="text-uppercase">Commentaires</h2>
    <?php
    while ($comment = $comments->fetch())
    {
    ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <a href="index.php?action=signaler&amp;id=<?= $comment['id'] ?>"><span class="badge badge-dark">Signaler</span></a>
        <?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
        <a href="index.php?action=supprComment&amp;id=<?= $comment['id'] ?>"><span class="badge badge-dark">Supprimer</span></a>
        <?php } ?>
        <hr>
    <?php } ?>
</div>

<!-- Ajout d'un commentaire -->
<div class="container mt-5 mb-5">
    <h3 class="text-uppercase">Ajouter un commentaire</h3>
    <form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
        <div class="form-group">
            <input type="text" id="author" name="author" class="form-control" placeholder="Votre pseudo">
        </div>
        <div class="form-group">
            <textarea name="comment" id="comment" cols="20" rows="10" class="form-control" placeholder="Votre commentaire"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>

