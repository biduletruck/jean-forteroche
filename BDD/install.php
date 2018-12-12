<?php

/**
 * Installation des sources sql
 * Il est nécessaire de créer la base de données.
 * le non de la base doit correspondre à la ligne $dbname.
 */

$sqlFile = './BDD/forteroche.sql';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'forteroche';
//exec("mysql --user=$dbuser --password='$dbpass' --host=$dbhost $dbname < ".$sqlFile);
exec("mysql --user=$dbuser  --host=$dbhost $dbname < ".$sqlFile);


/**
 * Configuration du module Responsive File Manager pour tinyMCE
 * Ajout de 2 dossier
 * Déplacement des fichiers de configuration
 */
/*
$pluginTinyDest = './vendor/tinymce/tinymce/plugins/responsivefilemanager/';
$imgTinyDest = './vendor/tinymce/tinymce/plugins/responsivefilemanager/img/';
mkdir($pluginTinyDest);
mkdir($imgTinyDest);
copy("./Core/Assets/tinymce/plugins/responsivefilemanager/plugin.min.js", $pluginTinyDest . "plugin.min.js");
copy("./Core/Assets/tinymce/plugins/responsivefilemanager/img/insertfile.gif", $imgTinyDest . "insertfile.gif");
*/
?>