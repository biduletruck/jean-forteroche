<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <H1><?= $titre ?></H1>
        </div>
        <div class="col-xs-12 col-md-12">
            <button type="button" id="adminBtnNewPost" class="btn btn-primary btn">
                <i class="icon icon-sign-out icon-lg"></i> Ajouter un post</button>
        </div>
    </div>

    <div class="row" id="adminNewPost">
        <div class="col-xs-12">
            <form action="admin/posts/addpost" method="post">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <label for="addTitrePost">Titre du Post</label>
                            <input type="text" id="addTitrePost" name="titrePost" class="form-control" placeholder="Titre du post" required>
                        </div>
                        <div class="form-group">
                            <label for="addContent">Corps du texte</label>
                            <textarea  class="form-control tinymce" name="content" id="addContent"></textarea>
                        </div>
                        <div class="col-xs-12 col-md-12">
                            <button type="submit" id="adminPublish" name="adminSavePost" value="1" class="btn btn-primary"><i class="icon icon-check icon-lg"></i> Publier</button>
                            <button type="submit"id="adminSavePost" name="adminSavePost" value="0" class="btn btn-info "><i class="icon icon-check icon-lg"></i> Sauvegarder</button>
                            <button type="reset" id="adminCloseNewPost" name="adminCloseNewPost" class="btn btn-danger pull-right"><i class="icon icon-times icon-lg"></i> Annuler</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <table class="table table-hover" >
                <caption class="text-center">Liste des posts</caption>
                <thead >
                <tr>
                    <th class="text-center">Supprimer</th>
                    <th class="text-center">Date de création</th>
                    <th class="text-center">Titre</th>
                    <th class="text-center">Modifier</th>
                    <th class="text-center">Statut</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr class="text-center">
                        <td>
                            <form action="admin/posts/deletepost" method="post">
                                <button type="submit" name="deletepost" value="<?= $post->BIL_ID ?>" class="btn btn-danger btn-xs" >Delete</button>
                            </form>
                        </td>
                        <td><?= $post->BIL_DATE ?></td>
                        <td><?= $post->BIL_TITRE ?></td>
                        <td><button type="button" data-toggle="modal" data-target="#modifierModal" id="modifier<?= $post->BIL_ID ?>" name="modifier" value="<?= $post->BIL_ID ?>" class="btn btn-warning btn-xs"> Modifier</button></td>
                        <td><button type="button" id="<?= $post->BIL_ID ?>" name="publication" value="<?= $post->BIL_STATUS ?>" class="btn btn-<?= $post->BIL_STATUS == 0 ? "info" : "success" ?> btn-xs"> <?= $post->BIL_STATUS == 0 ? "Publier" : "Depublier" ?></button></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="modifierModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                <h4 class="modal-title">Modification du post</h4>
            </div>
            <div class="modal-body">
                <form action="admin/posts/updatepost" role="form" method="post">
                    <input type="hidden" id="updateIdPost" name="idPost" value="">
                    <div class="form-group">
                        <label for="UpdateTitrePost">Titre du Post</label>
                        <input type="text" id="UpdateTitrePost" name="titrePost" class="form-control" placeholder="Titre du post" required>
                    </div>

                    <div class="form-group">
                        <label for="updateContent">Corps du texte</label>
                        <textarea class="form-control tinymce" name="content" id="updateContent"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="adminUpdate" name="adminUpdatePost" class="btn btn-primary"><i class="icon icon-check icon-lg"></i> Mettre à jour</button>
                <button type="reset" id="adminCloseUpdatePost" name="adminCloseUpdatePost" aria-hidden="true" data-dismiss="modal" class="btn btn-danger pull-right "><i class="icon icon-times icon-lg"></i> Annuler</button>
            </div>
                </form>
        </div>
    </div>
</div>