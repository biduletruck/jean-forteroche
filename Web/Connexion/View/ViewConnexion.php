<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <H1> affichage de la vue connexion</H1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <form class="form-inline" role="form" name="form" action="login" method="post">
                <div class="form-group">
                    <label class="sr-only" for="inputUserName">Nom utilisateur</label>
                    <input type="text" name="inputUserName" class="form-control" id="inputUserName" placeholder="Votre Nom utilisateur">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="ImputPassword">Mot de passe</label>
                    <input type="password" name="ImputPassword" class="form-control" id="ImputPassword" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-primary"><i class="icon icon-check icon-lg"></i> Valider</button>
                <button type="button" class="btn btn-inverse"><i class="icon icon-times icon-lg"></i> Annule</button>
            </form>
        </div>
    </div>
</div>