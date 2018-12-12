<?php
/**
 * Created by PhpStorm.
 * User: clement yann
 * Date: 09/12/2018
 * Time: 23:07
 */

namespace Web\Admin\Controller;


use Core\Lib\App;
use Core\Lib\Auth\Session;
use Web\Admin\Model\ModelCompany;

class ControllerCompany extends ControllerAdmin
{

    private $comapny;
    private $request;

    public function __construct()
    {
        parent::__construct();
        $this->comapny = new ModelCompany();
    }


    public function viewCompany()
    {
        $titre = 'Admin Entreprise';
        $company = $this->comapny->companyExist();
        $company = null;
        $this->render('admin','company', compact('titre', 'company'));

    }

}