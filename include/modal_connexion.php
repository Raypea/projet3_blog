<!-- Modal -->
<div class="modal fade" id="connexionsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
            <section id="connect">
            <div class="row">
                <div class="text-center col-xl-12 mx-auto">
                    <div class="text-align">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2>Connexion</h2>
                    </div>
                    <hr>
                    <form  action="index.php?action=connexion" method="post">
                        <div class="form-group">
                            <div class="pt-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div><!--/.pt-2-->
                            <div class="pt-2">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" placeholder="Mot de passe" name="password" required>
                            </div><!--/.pt-2-->
                        </div><!--/.form-group-->
                        <div class="text-center">
                            <button type="submit" class="mb-2 btn btn-outline-primary">Se connecter</button>
                        </div><!--/.text-center-->
                    </form>
                </div><!--/.col-xl-7-->
            </div><!--/.row-->
            </div><!--/.modal-body-->
        </div>
    </div>
</div>