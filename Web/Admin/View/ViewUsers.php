<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <H1><?= $titre ?></H1>
        </div>
        <div class="col-xs-12 col-md-12">
            <button type="button" data-toggle="modal" class="btn btn-primary btn" data-target="#myModal">
                <i class="icon icon-sign-out icon-lg"></i> Ajouter un utilisateur</button>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-hover" >
                <caption class="text-center">Liste des utilisateurs</caption>
                <thead >
                <tr>
                    <th class="text-center">Utilisateur</th>
                    <th class="text-center">Compte</th>
                    <th class="text-center">Modifier</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($listUsers as $user): ?>
                <tr class="text-center">
                    <td><?= $user->username; ?></td>
                    <td>
                        <form action="/jean-forteroche/admin/users/deleteuser" class="form-inline" role="form" method="post">
                            <button type="submit" name="deleteUser" value="<?= $user->username ?>" class="btn btn-xs btn-danger">Supprimer</button>
                        </form>
                    </td>
                    <td>
                        <form action="/jean-forteroche/admin/users/changepassword" class="form-inline" role="form" method="post">
                            <div class="form-group">
                                <input type="password" class="form-control" name="userPassword" placeholder="Modifier le mot de passe" required>
                            </div>
                            <button type="submit" name="passwordUser" value="<?= $user->username ?>"  class="btn btn-xs btn-warning">Modifier</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>


<!-- Modale -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-70">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ajouter un nouvel utilisateur</h4>
            </div>
            <div class="modal-body">
                <?php include ('ViewUserAdd.php'); ?>
            </div>
        </div>
    </div>
</div>
