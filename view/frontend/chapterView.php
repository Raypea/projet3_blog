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
                      <p class="mb-0"><strong><?php  echo $date->format('d/m/Y \à H\hi')." par ". $chap["author"]."<br>"; ?></strong></p>
                      <!-- Utilisation de la fonction substr() pour ne pas afficher le texte ou afficher une partie du texte -->
                      <p class="mb-0"> <?php  echo substr($chap["content"]."<br>", 0, 0); ?></p>
                      <!-- Admin connecté --> 
                      <?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
                      <a href="index.php?action=modifier&id=<?= $chap['id'];?>"><button class="btn btn-primary mt-5">Modifier</button></a>
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
</div>

<div class="container text-center">
  <h3 class="p-4">
    <?php
      for($i = 1; $i <= $nombrePages; $i++)
      {
        if($i == $pageActive) //Si il s'agit de la page actuelle...
        {
            echo ''.$i.''; 
        }	
        else //Sinon...
        {
            echo ' <a href="index.php?action=romans&page='.$i.'">'.$i.'</a> ';
        }
      }
    ?>
  </h3>
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
              <input type="text" id="author" name="author" class="form-control" placeholder="Votre nom" value="Jean Forteroche">
          </div>

          <div class="form-group">
              <textarea name="content" id="content" cols="40" rows="20" class="form-control" placeholder="Votre chapitre"></textarea>
          </div>

          <div class="form-group">
              <button type="submit" class="btn btn-primary">Envoyer</button>
          </div>
      </form>
  </div>
<?php } ?>