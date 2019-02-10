<!-- Liste des chapitres -->
<div class="mt-5 mb-5 container">
  <h2 class="text-uppercase">Billet simple pour l'Alaska</h2>
    <div class="row">
      <?php foreach ($chapters as $chap) { ?>
        <?php $date = new DateTime($chap['date_publication']) ?>
        <div class="col-xl-12">
          <div class="chapters">
            <div class="mt-1 mb-2">
              <div class="card ml-3">
                <div class="card-body animated fadeIn">
                  <a href="index.php?action=chapter&id=<?= $chap['id'];?>">
                      <h2 class="text-uppercase"> <?php  echo $chap["title"]."</br>"; ?></h2>
                      <p class="mb-0"><strong>Ajouté le : <?php  echo $date->format('d/m/Y \à H\hi')." par ". $chap["author"]."<br>"; ?></strong></p>
                      <!-- Utilisation de la fonction substr() pour ne pas afficher le texte ou afficher une partie du texte -->
                      <p class="mb-0"> <?php  echo substr($chap["text"]."<br>", 0, 0); ?></p>
                      <!-- Admin connecté --> 
                      <?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
                      <a data-toggle="modal" data-target="#editmodal"><button class="btn btn-primary mt-5">Modifier</button></a>
                      <a href="index.php?action=supprimer&id=<?= $chap['id'];?>"><button class="btn btn-primary mt-5">Supprimer</button></a>
                      <?php } ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php } ?>
    </div>
    <?php include("modal_editView.php") ?>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination pagination-lg justify-content-center mb-5">
    <li class="page-item"><a class="page-link" href="#">Précédent</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
  </ul>
</nav>

<!-- Ajout d'un chapitre en base de données seulement si l'administrateur est connecté -->
<?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
  <div class="container mt-5 mb-5">
      <h3 class="text-uppercase">Ajouter un chapitre</h3>
      <form action="index.php?action=addChapter" method="post">
          <div class="form-group">
              <input type="text" id="title" name="title" class="form-control" placeholder="Titre du chapitre">
          </div>

          <div class="form-group">
              <input type="text" id="author" name="author" class="form-control" placeholder="Votre nom" value="Jean Forteroche">
          </div>

          <div class="form-group">
              <textarea name="text" id="text" cols="40" rows="20" class="form-control" placeholder="Votre chapitre"></textarea>
          </div>

          <div class="form-group">
              <button type="submit" class="btn btn-primary">Envoyer</button>
          </div>
      </form>
  </div>
<?php } ?>