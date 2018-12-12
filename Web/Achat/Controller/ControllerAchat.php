<?php
/**
 * Created by PhpStorm.
 * User: clement yann
 * Date: 12/12/2018
 * Time: 13:01
 */

namespace Web\Achat\Controller;


use Core\Lib\Controller;

class ControllerAchat extends Controller implements InterfaceAchat

{

    public function addNewPhone()
    {
        // TODO: Implement addNewPhone() method.
        $titre = 'New Phone';
        $this->render('achat','achatPhone', compact('titre'));
    }

    public function updatePhone()
    {
        // TODO: Implement updatePhone() method.
        $titre = 'Update Phone';
        $this->render('achat','updatePhone', compact('titre'));
    }
}