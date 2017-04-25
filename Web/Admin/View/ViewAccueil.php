<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <H1><?= $titre ?></H1>
    </div>

    <div class="row" id="adminAccueil">
        <div class="col-xs-12">
            <form action="/jean-forteroche/admin/accueil/updateaccueil" method="post">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="form-group">
                            <label for="myTextarea">Personnalisez la page d'accueil</label>
                            <textarea name="content" class="form-control tinymce" name="myTextarea" id="myTextarea">
                                <?= $article->art_content ?>
                            </textarea>
                        </div>
                        <div class="col-xs-12 col-md-12">
                            <button type="submit" id="adminPublish" name="adminSaveArticle" class="btn btn-primary"><i class="icon icon-check icon-lg"></i> Publier</button>
                            <button type="reset" id="adminCloseNewPost" name="adminCloseArticle" class="btn btn-danger pull-right"><i class="icon icon-times icon-lg"></i> Annuler</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>