<?php
/**
 * Created by PhpStorm.
 * User: clement yann
 * Date: 09/12/2018
 * Time: 19:26
 */

namespace Web\Phone\Model;

use Core\Lib\DatabaseRepository;


class ModelPhone extends DatabaseRepository implements PhoneGateway
{
    /**
     * @return mixed
     */
    public function findAllPhone()
    {
       return $this->db->getQuery("SELECT * FROM forteroche.t_phone;");
    }

    /**
     * @param $idPhone
     * @return mixed
     */
    public function findPhone($idPhone)
    {
        // TODO: Implement findPhone() method.
    }

    /**
     * @param $model
     * @return mixed
     */
    public function addNewPhone($model)
    {
        // TODO: Implement addNewPhone() method.
    }

    /**
     * @param $idPhone
     * @param $model
     * @return mixed
     */
    public function updatePhone($idPhone, $model)
    {
        // TODO: Implement updatePhone() method.
    }

    /**
     * @param $idPhone
     * @return mixed
     */
    public function deletePhone($idPhone)
    {
        // TODO: Implement deletePhone() method.
    }


}