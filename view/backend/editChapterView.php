<div class="container mt-5 mb-5">
    <form  action="index.php?action=editer&id=<?= $chapter['id'];?>" method="post">
        <div class="form-group">
            <div class="pt-2">
                <label for="title">Titre du chapitre</label>
                <input  name="title" type="text" value="<?php echo $chapter['title'];?>" class="form-control" placeholder="Votre nouveau titre" required>
            </div><!--/.pt-2-->
            <div class="pt-2">
                <label for="password">Changer votre texte</label>
                <div class="form-group">
                    <textarea name="content" id="content" cols="50" rows="60" class="form-control"><?= $chapter['content'];?></textarea>
                </div>
            </div><!--/.pt-2-->
        </div><!--/.form-group-->
        <div class="text-center">
            <button type="submit" class="mb-2 btn btn-outline-primary">Valider</button>
        </div><!--/.text-center-->
    </form>
</div>