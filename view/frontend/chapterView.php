<!-- Liste des chapitres -->
<div class="mt-5 mb-5 container">
  <h2 class="text-uppercase">Tous les chapitres</h2>
    <div class="row">
      <?php foreach ($chapters as $chap) { ?>
        <?php $date = new DateTime($chap['date_publication']) ?>
        <div class="col-xl-12">
          <div class="chapters">
            <div class="mt-1 mb-2">
              <div class="card ml-3">
                <div class="card-body">
                  <a href="index.php?action=chapter&id=<?= $chap['id'];?>">
                    <h2 class="text-uppercase"> <?php  echo $chap["title"]."</br>"; ?></h2>
                    <p class="mb-0"><strong>Ajouté le : <?php  echo $date->format('d/m/Y \à H\hi')." par ". $chap["author"]."<br>"; ?></strong></p>
                    <p class="mb-0"> <?php  echo $chap["text"]."<br>"; ?></p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php } ?>
    </div>
</div>

<!-- Ajout d'un chapitre en base de données seulement si l'administrateur est connecté -->
<?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
  <div class="container mt-5 mb-5">
      <h3 class="text-uppercase">Ajouter un chapitre</h3>
      <form action="index.php?action=addChapter" method="post">
          <div class="form-group">
              <input type="text" id="title" name="title" class="form-control" placeholder="Titre du chapitre">
          </div>

          <div class="form-group">
              <input type="text" id="author" name="author" class="form-control" placeholder="Votre pseudo">
          </div>

          <div class="form-group">
              <textarea name="text" id="text" cols="40" rows="5" class="form-control" placeholder="Votre chapitre"></textarea>
          </div>

          <div class="form-group">
              <button type="submit" class="btn btn-primary">Envoyer</button>
          </div>
      </form>
  </div>
<?php } ?>