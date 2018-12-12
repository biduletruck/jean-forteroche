<?php
/**
 * Created by PhpStorm.
 * User: clement yann
 * Date: 09/12/2018
 * Time: 23:09
 */

namespace Web\Admin\Model;


use Core\Lib\DatabaseRepository;

class ModelCompany extends DatabaseRepository

{

    private $company = null;

    public function __construct()
    {
        parent::__construct();


    }

    public function companyExist()
    {
        return $this->db->getQuery("SELECT * FROM forteroche.t_company")->fetchAll(\PDO::FETCH_OBJ);;
    }

    public function createCompany($companyName, $companyAdress, $companyCodePostal, $companyCity, $companySiren,$companyCostHour)
    {
        $sql = "INSERT INTO forteroche.t_company  (companyName, companyAdress, companyCodePostal, companyCity, companySiren,companyCostHour) VALUES (:companyName, :companyAdress, :companyCodePostal, :companyCity, :companySiren, :companyCostHour)";
        $array = [
            ":companyName"          => $companyName,
            ":companyAdress"        => $companyAdress,
            ":companyCodePostal"    => $companyCodePostal,
            ":companyCity"          => $companyCity,
            ":companySiren"         => $companySiren,
            ":companyCostHou"       => $companyCostHour
        ];
        $this->db->getPrepare($sql, $array);
        return true;
    }

    public function updateCompany($idCompany, $param, $val)
    {
        $sql = "UPDATE forteroche.t_company SET :param = :val WHERE idCompany = :idCompany";
        $array = [
            ":param"        => $param,
            ":val"        => $val,
            ":idCompany"    => $idCompany
            ];
        $this->db->getPrepare($sql, $array);
        return true;
    }

}