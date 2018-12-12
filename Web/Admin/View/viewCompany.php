<div class="jumbotron">
    <h2>
        Configuration de l'entreprise
    </h2>
</div>

<div class="container">
    <div class="row ">
        <div class="col-xs-12 col-md-12 ">
            <?php
            var_dump($company);


            $company != null ? require_once "viewCompanyDetails.php" :  require_once "viewCompanyCreate.php"; ?>
        </div>
    </div>
</div>
