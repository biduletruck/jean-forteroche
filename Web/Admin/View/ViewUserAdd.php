<form class="form-horizontal" role="form" name="form" action="users/adduser" method="post">
    <div class="form-group">
        <label for="inputUsername" class="col-xs-4 control-label">Utilisateur</label>
        <div class="col-xs-8">
            <input type="text" name="inputUsername" class="form-control" id="inputUsername" placeholder="Nom utilisateur" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword1" class="col-xs-4 control-label">Mot de passe</label>
        <div class="col-xs-8">
            <input type="password" name="inputPassword" class="form-control" id="inputPassword1" placeholder="Mot de passe" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword2" class="col-xs-4 control-label">Confirmation</label>
        <div class="col-xs-8">
            <input type="password" name="inputPassword2" class="form-control" id="inputPassword2" placeholder="Confirmer le mot de passe" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-4 col-xs-8">
            <button type="submit" class="btn btn-primary"><i class="icon icon-check icon-lg"></i> Valider</button>
            <button type="reset" aria-hidden="true" data-dismiss="modal" class="btn btn-inverse"><i class="icon icon-times icon-lg"></i> Annuler</button>
        </div>
    </div>
</form>