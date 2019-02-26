<!-- Affichage des commentaires --> 
<div class="container mt-5 mb-5">
    <h2 class="text-uppercase">Commentaires</h2>
    <?php
    foreach ($moderatedComments as $comment)
    {
    ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
        <a href="index.php?action=supprComment&amp;id=<?= $comment['id'] ?>"><span class="badge badge-dark">Supprimer</span></a>
        <a href="index.php?action=unsignal&amp;id=<?= $comment['id'] ?>"><span class="badge badge-dark">Retirer le signalement</span></a>
        <?php } ?>
        <hr>
    <?php } ?>
</div>