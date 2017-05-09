<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <H1><?= $titre ?></H1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <table class="table table-hover" >
                <caption class="text-center">Liste des posts</caption>
                <thead >
                <tr>
                    <th class="text-center">Supprimer</th>
                    <th class="text-center">Valider</th>
                    <th class="text-center">Date de création</th>
                    <th class="text-center">Auteur</th>
                    <th class="text-center">Modifier</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post):?>

                    <tr class="text-center">
                        <td>
                            <form action="admin/posts/deletealertcomment" method="post">
                                <button type="submit" name="deleteComment" value="<?= $post->COM_ID ?>" class="btn btn-danger btn-xs" >Delete</button>
                            </form>
                        </td>
                        <td>
                            <form action="admin/posts/validealertcomment" method="post">
                                <button type="submit" name="validComment" value="<?= $post->COM_ID ?>" class="btn btn-success btn-xs" >Valid</button>
                            </form>
                        </td>
                        <td><?= $post->COM_DATE ?></td>
                        <td><?= $post->COM_AUTEUR ?></td>
                        <td><button type="button" data-toggle="modal" data-target="#modifierModal" id="modifierAlert<?= $post->COM_ID ?>" name="modifierAlert" value="<?= $post->COM_ID ?>" class="btn btn-warning btn-xs"> Modifier</button></td>
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
                <h4 class="modal-title">Modification du commentaire</h4>
            </div>
            <div class="modal-body">
                <form action="admin/posts/updatealertcomment" role="form" method="post">
                    <input type="hidden" id="updateidAlert" name="idAlert" value="">
                    <div class="form-group">
                        <label for="updateContent">Corps du texte</label>
                        <textarea class="form-control tinymce" name="content" id="updateContent"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="adminUpdateAlert" name="adminUpdateAlert" class="btn btn-primary"><i class="icon icon-check icon-lg"></i> Mettre à jour</button>
                <button type="reset" id="adminCloseUpdateAlert" name="adminCloseUpdateAlert" aria-hidden="true" data-dismiss="modal" class="btn btn-danger pull-right "><i class="icon icon-times icon-lg"></i> Annuler</button>
            </div>
            </form>
        </div>
    </div>
</div>
