
<?php foreach ($comments as $comment)
{
    $largueur = 12 - $comment->LEVEL;
?>
    <div class="row">
        <?php if($comment->LEVEL > 0){ ?>
        <div class="col-xs-1  col-xs-offset-<?= $comment->LEVEL - 1; ?> col-md-1 col-md-offset-<?= $comment->LEVEL - 1; ?>">
            <img src="/jean-forteroche/Core/Assets/img/arrow-response-64x64.png" class="img-responsive " alt="reponse">
        </div>
        <?php } ?>

        <div class="col-xs-<?= $largueur; ?> col-md-<?= $largueur; ?> ">
            <div id="post<?= $comment->COM_ID ?>" class= "<?= $comment->COM_ALERT == "0" ? "panel panel-default" : "panel panel-danger" ?>" >
                <div class="panel-heading">
                    <h1 class="panel-title"><?= $comment->COM_AUTEUR; ?> <small><i>a ajouté le: <?= $comment->COM_DATE; ?></i></small></h1>
                </div>
                <div class="panel-body">
                    <div class="pull-left">
                        <img src="/jean-forteroche/Core/Assets/img/avatar-tiny.jpg" class="media-object img-circle" alt="Utilisateur">
                    </div>
                    <div>
                        <?= $comment->COM_CONTENU; ?>
                    </div>
                </div>

                <div class="panel-footer clearfix">
                    <?php if ($comment->LEVEL < 3) { ?>
                        <button name="addResponse" class="btn btn-info btn-xs btn-response" value="<?= $comment->COM_ID ?>"><span class="glyphicon glyphicon-pencil"></span> Réponde</a></button>
                    <?php } ?>
                    <div class="pull-right">
                        <?php if ($comment->COM_ALERT == 0) { ?>
                            <form action="#" method="post">
                                <button id="alert<?= $comment->COM_ID ?>" name="alertComment" value="<?= $comment->COM_ID ?>" class="btn btn-warning btn-xs btn-alert"><span class="glyphicon glyphicon-alert"></span> Signaler</button>
                            </form>
                        <?php } ?>
                    </div>
                    <div class="pull-right">
                        <?php if ( ( isset($_SESSION['JFR']['userlevel']) && ($_SESSION['JFR']['userlevel'] === '1000')  ) && ($comment->COM_ALERT == 1) ) { ?>
                            <form action="#" method="post">
                                <button type="submit" id="alertValid<?= $comment->COM_ID ?>" name="alertValid" value="<?= $comment->COM_ID ?>" class="btn btn-success btn-xs btn-alertValid"><span class="glyphicon glyphicon-ok"></span> Valider</button>
                                <button type="submit" id="alertDelete<?= $comment->COM_ID ?>" name="alertDelete" value="<?= $comment->COM_ID ?>" class="btn btn-danger btn-xs btn-alertDelete"><span class="glyphicon glyphicon-remove"></span> Supprimer</button>
                            </form>
                        <?php } ?>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-xs-12 col-md-12">
            <div class="col-xs-<?= $largueur; ?> col-xs-offset-<?= $comment->LEVEL; ?> col-md-<?= $largueur; ?> col-md-offset-<?= $comment->LEVEL; ?> addResponseComment" id="response<?= $comment->COM_ID ?>">
                <div class="panel-body">
                    <form action="/jean-forteroche/post/commentresponse/<?= $post->BIL_ID ?>" method="post">
                        <div class="form-group">
                            <label for="reponseAuteur">Pseudo</label>
                            <input type="text" name="reponseAuteur" class="form-control" id="reponseAuteur" placeholder="Pseudo" required>
                        </div>
                        <div class="form-group">
                            <label for="reponseCommentaire">Votre réponse</label>
                            <textarea name="reponseCommentaire" class="form-control" required></textarea>
                        </div>
                        <div class="pull-right">
                            <button type="submit" name="validResponse" value="<?= $comment->COM_ID ?>" class="btn btn-primary">Valider</button>
                            <button type="reset" name="closeResponseComment" class="btn btn-default">Annuler</button>
                        </div>
                        <div>
                            <input type="hidden" name="bil_id" value="<?= $comment->BIL_ID; ?>">
                            <input type="hidden" name="parent_id" value="<?= $comment->PARENT_ID; ?>">
                            <input type="hidden" name="level" value="<?= $comment->LEVEL; ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
<?php } ?>


