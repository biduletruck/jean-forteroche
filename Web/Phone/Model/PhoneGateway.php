<?php
/**
 * Created by PhpStorm.
 * User: clement yann
 * Date: 09/12/2018
 * Time: 19:26
 */

namespace Web\Phone\Model;


interface PhoneGateway
{

    public function findAllPhone();

    public function findPhone($idPhone);

    public function addNewPhone($model);

    public function updatePhone($idPhone, $model);

    public function deletePhone($idPhone);



}