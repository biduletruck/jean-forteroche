<?php
/**
 * Created by PhpStorm.
 * User: clement yann
 * Date: 12/12/2018
 * Time: 12:59
 */

namespace Web\Vente\Controller;


interface InterfaceVente
{

    public function showAllPhones();

    public function showPhone($idPhone);

    public function sellPhone($idPhone);


}