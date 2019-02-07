<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
            <section id="connect">
            <div class="row">
                <div class="text-center col-xl-12 mx-auto">
                    <div class="text-align">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2>Modification</h2>
                    </div>
                    <hr>
                    <form  action="index.php?action=editer" method="post">
                        <div class="form-group">
                            <div class="pt-2">
                                <label for="title">Titre du chapitre</label>
                                <input type="title" class="form-control" placeholder="Votre nouveau titre" name="title" required>
                            </div><!--/.pt-2-->
                            <div class="pt-2">
                                <label for="password">Changer votre texte</label>
                                <div class="form-group">
                                    <textarea name="text" id="text" cols="80" rows="80" class="form-control"></textarea>
                                </div>
                            </div><!--/.pt-2-->
                        </div><!--/.form-group-->
                        <div class="text-center">
                            <button type="submit" class="mb-2 btn btn-outline-primary">Valider</button>
                        </div><!--/.text-center-->
                    </form>
                </div><!--/.col-xl-7-->
            </div><!--/.row-->
            </div><!--/.modal-body-->
        </div>
    </div>
</div>