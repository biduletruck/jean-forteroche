<?php
/**
 * Created by PhpStorm.
 * User: yclem001
 * Date: 06/02/2017
 * Time: 13:22
 */


define('ROOT', __DIR__);
require (ROOT . '/vendor/autoload.php');
require (ROOT . '/Core/App/boostrap.php');


$config = [];
$config['loadedRoutes'] = [

    ["url" => "#404#", "src" => "Error", "controller" => "Error", "action" => "error"],


    //company
    ["url" => "#admin/company#", "src" => "Admin", "controller" => "Company", "action" => "viewCompany"],

    //achat
    ["url" => "#achat/update#", "src" => "Achat", "controller" => "Achat", "action" => "updatePhone"],
    ["url" => "#achat#", "src" => "Achat", "controller" => "Achat", "action" => "addNewPhone"],



    //ModelComments Back Office
    ["url" => "#post/commentresponse/(\\d+)#", "src" => "Blog", "controller" => "Comments", "action" => "addCommentResponse"],
    ["url" => "#post/deletecommentsalert/(\\d+)#", "src" => "Blog", "controller" => "Comments", "action" => "deleteCommentsFromAlert"],
    ["url" => "#post/removealert/(\\d+)#", "src" => "Blog", "controller" => "Comments", "action" => "removeAlert"],
    ["url" => "#post/addalert/(\\d+)#", "src" => "Blog", "controller" => "Comments", "action" => "addAlert"],

    //Alerts Back Office
    ["url" => "#admin/posts/findalertjson/#", "src" => "Admin", "controller" => "Alert", "action" => "findAlertOnJson"],
    ["url" => "#admin/posts/updatealertcomment#", "src" => "Admin", "controller" => "Alert", "action" => "updateAlertComment"],
    ["url" => "#admin/posts/validealertcomment#", "src" => "Admin", "controller" => "Alert", "action" => "validAlertComment"],
    ["url" => "#admin/posts/deletealertcomment#", "src" => "Admin", "controller" => "Alert", "action" => "deleteAlertComment"],
    ["url" => "#admin/posts/alertComments#", "src" => "Admin", "controller" => "Alert", "action" => "viewAlertComments"],

    //ModelPosts Back Office
    ["url" => "#admin/posts/publish/#", "src" => "Admin", "controller" => "Post", "action" => "publishingPost"],
    ["url" => "#admin/posts/updatepost#", "src" => "Admin", "controller" => "Post", "action" => "updatePostAdmin"],
    ["url" => "#admin/posts/deletepost#", "src" => "Admin", "controller" => "Post", "action" => "deletePostAdmin"],
    ["url" => "#admin/posts/addpost#", "src" => "Admin", "controller" => "Post", "action" => "addPostAdmin"],
    ["url" => "#admin/posts/findjson/(\\d+)#", "src" => "Admin", "controller" => "Post", "action" => "findPostOnJson"],
    ["url" => "#admin/posts#", "src" => "Admin", "controller" => "Post", "action" => "viewPostsAdmin"],

    //Users Back Office
    ["url" => "#admin/users/changepassword#", "src" => "Admin", "controller" => "Users", "action" => "changeUserPassword"],
    ["url" => "#admin/users/deleteuser#", "src" => "Admin", "controller" => "Users", "action" => "deleteUser"],
    ["url" => "#admin/users/adduser#", "src" => "Admin", "controller" => "Users", "action" => "addUser"],
    ["url" => "#admin/users#", "src" => "Admin", "controller" => "Users", "action" => "getUsers"],

    //ModelArticle Back Office
    ["url" => "#admin/accueil/updateaccueil#", "src" => "Admin", "controller" => "Accueil", "action" => "updateAccueil"],
    ["url" => "#admin/accueil#", "src" => "Admin", "controller" => "Accueil", "action" => "getAccueil"],

    //Connexion Back Office
    ["url" => "#admin#", "src" => "Admin", "controller" => "Admin", "action" => "getAdmin"],
    ["url" => "#connexion#", "src" => "Connexion", "controller" => "Connexion", "action" => "userIsNotConnected"],
    ["url" => "#login#", "src" => "Connexion", "controller" => "Connexion", "action" => "connectUser"],
    ["url" => "#logout#", "src" => "Connexion", "controller" => "Connexion", "action" => "userLogout"],

    //Front actions
    ["url" => "#post/post/(\\d+)#", "src" => "Blog", "controller" => "Comments", "action" => "addComment"],
    ["url" => "#post/(\\d+)#", "src" => "Blog", "controller" => "Posts", "action" => "getPost"],
    ["url" => "#posts#", "src" => "Blog", "controller" => "Posts", "action" => "findAllPosts"],

    //Front office
    ["url" => "#phone/phone/(\\d+)#", "src" => "Phone", "controller" => "Phone", "action" => "addNewPhone"],
    ["url" => "#phone#", "src" => "Phone", "controller" => "Phone", "action" => "findAllPhones"],

    //Accueil
    ["url" => "#^$#", "src" => "Accueil", "controller" => "Accueil", "action" => "accueil"],
    ["url" => "#accueil#", "src" => "Accueil", "controller" => "Accueil", "action" => "accueil"]

];

$app = new \Core\Lib\App($config);
$app->run();
