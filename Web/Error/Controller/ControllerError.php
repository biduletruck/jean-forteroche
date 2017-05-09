<?php
/**
 * Created by PhpStorm.
 * User: yann
 * Date: 10/05/17
 * Time: 00:15
 */

namespace Web\Error\Controller;


use Core\Lib\Controller;

class ControllerError extends Controller
{

    public function error()
    {

        $error =  "Erreur page non trouvée";
        $this->render('error','error', compact('error'));
    }

}