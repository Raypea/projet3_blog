  <div class="mt-5 mb-5 container">
  <h2 class="text-uppercase">Tous les chapitres</h2>
    <div class="row">
      <?php foreach ($chapters as $chap) { ?>
        <?php $date = new DateTime($chap['date_publication']) ?>
        <div class="mt-1 mb-2">
          <div class="card ml-3">
            <div class="card-body">
              <h2 class="text-uppercase"> <?php  echo $chap["title"]."</br>"; ?></h2>
              <p class="mb-0">Ajouté le : <?php  echo $date->format('d/m/Y \à H\hi')." par ". $chap["author"]."<br>"; ?></p>
              <p class="mb-0"> <?php  echo $chap["text"]."<br>"; ?></p>
            </div>
        </div>
        </div>
    <?php } ?>
    </div>
</div>
