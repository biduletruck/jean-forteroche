<!DOCTYPE html>
<html>
<head>

    <!--Import Boostrap.css-->
    <link rel="stylesheet" href="/jean-forteroche/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/jean-forteroche/Core/Assets/css/styles.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
    <!-- <script src="/jean-forteroche/vendor/components/jquery/jquery.min.js" ></script>
    <script src="/jean-forteroche/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- <script src='/jean-forteroche/vendor/tinymce/tinymce/tinymce.min.js'></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.7/jquery.tinymce.min.js"></script>
    <script Content-Type="application/javascript">
        tinymce.init({
            selector: '.tinymce',
            extended_valid_elements : 'img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]',
            height: 400,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            relative_urls: false,

            filemanager_title:"Responsive Filemanager",
            filemanager_crossdomain: false,
            external_filemanager_path:"/jean-forteroche/Core/Assets/filemanager/",
            external_plugins: { "filemanager" : "/jean-forteroche/Core/Assets/filemanager/plugin.min.js"},

            image_advtab: true,
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
            toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview"
        });
    </script>

    <title><?php // $titre ?></title>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/jean-forteroche/accueil">Jean ForteRoche</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/jean-forteroche/accueil">Accueil</a></li>
                    <li><a href="/jean-forteroche/posts">Mon nouveau livre</a></li>
                    <?php if ( (isset($_SESSION['JFR']['username'])) && ($_SESSION['JFR']['userlevel'] == '1000') ) { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                            <ul class="dropdown-menu dropdown-menu-inverse">
                                <li><a href="/jean-forteroche/admin">Accueil Admin</a></li>
                                <li><a href="/jean-forteroche/admin/accueil">Gestion de l' Accueil</a></li>
                                <li><a href="/jean-forteroche/admin/users">Gestion des Utilisateurs</a></li>
                                <li><a href="/jean-forteroche/admin/posts">Gestion des Posts</a></li>
                                <li><a href="/jean-forteroche/admin/posts/alertComments">Gestion des Alertes <?= \Web\Admin\Controller\ControllerAlert::countAlertComments() ?></a></li>
                                <li class="divider"></li>
                                <li><a href="/jean-forteroche/logout">Deconnnexion</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li><a href="/jean-forteroche/admin">Admin</a></li>
                    <?php } ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>

    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <?php if ( isset($_SESSION['flash']) && !empty($_SESSION['flash']) ) {
                        $msg = \Core\Lib\Auth\Auth::getInstance()->session->deleteMessage() ?>
                        <?php foreach ($msg as $k => $v): ?>
                            <div class="row col-md-8 col-md-offset-2">
                                <div class="alert alert-<?= $k ?> alert-dismissable fade in">
                                    <i class="icon icon-times-circle icon-lg"></i>
                                    <strong> <?= $v ?> </strong>
                                </div>
                            </div>
                        <?php endforeach; } ?>
                </div>

                <div class="col-md-12">
                    <?= $content ?>
                </div> <!-- #contenu -->
                
            </div>
        </div>
    </div>


    <script src="/jean-forteroche/Core/Assets/js/app.js"></script>
</body>
</html>