

    <footer class="page-footer bg-dark pt-4">
        <div class="container text-center text-white text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <h5 class="text-uppercase">Retrouvez mes réseaux sociaux</h5>
                    <p>Blog de Jean Forteroche</p>
                </div>
                <ul class="nav justify-content-center">
                    <?php if (isset($_SESSION["id"]) AND !empty($_SESSION["id"]))  {  ?>
                        <li class="nav-item"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
                    <?php }  else  { ?>
                        <li class="nav-item"><a class="nav-link" style="cursor:pointer" data-toggle="modal" data-target="#connexionsmodal">Connexion</a></li>
                    <?php  }  ?>
                </ul>
            </div>
            <?php include("modal_connexion.php") ?>
        </div>

        <div class="footer-copyright text-center text-white py-3">
            © 2019 copyright
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>