<div class="container">
    <div class="jumbotron">
        <div class="row">
            <H1><?= $post->BIL_TITRE ?></H1>
        </div>
    </div>

    <div class="media">
        <div class="media-body">
            <p><?= $post->BIL_CONTENU ?></p>
        </div>
    </div>

<hr>
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="col-xs-12 col-md-6">
                <button type="button" id="viewAddComment" class="btn btn-primary btn-xs">Ajouter un commentaire</button>
            </div>
        </div>
    </div>

     <div class="row" id="addComment">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <?php include ('ViewAddComment.php'); ?>
        </div>
    </div>

<hr>

    <div class="row" id="allComments">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <?php include ('ViewComment.php'); ?>
        </div>
    </div>
</div>