<div class="row">

    <div class="col-xs-12 col-md-12">
        <form class="form" method="post" action="/jean-forteroche/post/post/<?= $post->BIL_ID ?>">
            <div class="form">
                <div class="form-group">
                    <label for="pseudoAuteur">Pseudo</label>
                    <input type="text" name="pseudoAuteur" class="form-control" id="pseudoAuteur" placeholder="Pseudo">
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control"></textarea>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Valider</button>
                    <button type="reset" id="resetComment" class="btn btn-default">Annuler</button>
                </div>
            </div>

        </form>
    </div>
</div>