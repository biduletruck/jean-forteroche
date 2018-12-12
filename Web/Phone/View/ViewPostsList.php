<?php foreach ($posts as $post): ?>
    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            <div class="pull-left"><h3 class="panel-title "><?= $post->BIL_TITRE; ?></h3></div>
            <div class="pull-right">
                <small>Ajouté le: 01/01/2017</small>
            </div>
        </div>

        <div class="panel-body">
            <div>
                <?= \Core\Lib\App::textSizeLimit($post->BIL_CONTENU, 300) ?>
            </div>
            <div class="pull-right">
                <a href="<?= BASE . "post/" . $post->BIL_ID; ?>" class="btn btn-primary btn-xs">Lire la suite ...</a>
            </div>
        </div>

    </div>
<?php endforeach; ?>