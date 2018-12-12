<?php
/**
 * Created by PhpStorm.
 * User: clement yann
 * Date: 09/12/2018
 * Time: 19:21
 */

namespace Web\Phone\Controller;

use Core\Lib\App;
use Core\Lib\Auth\Session;
use Core\Lib\Controller;
use Core\Lib\Router\RequestFactory;
use Web\Phone\Model\ModelPhone;

class ControllerPhone extends Controller
{

    private $idPhone;
    private $phone;
    private $request;

    public function __construct()
    {
        $this->phone = new ModelPhone();
        $request = new RequestFactory();
        $this->request = $request->buildRequest($_GET['url']);
    }

    public function findAllPhones()
    {
        $phones = $this->phone->findAllPhone();
        $this->render('phone','phoneList',compact('phones'));
    }
}