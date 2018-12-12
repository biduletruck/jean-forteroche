
<h1>Ca marche</h1>

<?php if ($phones === NULL)
    {
        echo "pas de téléphones";
    }
    ?>


<?php foreach ($phones as $phone): ?>
    <div class="panel panel-default">

        <?= $phone->phoneName ?>

    </div>
<?php endforeach; ?>