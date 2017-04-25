<?php

namespace Core\Lib;


class DatabaseRepository
{

    protected $db;

    function __construct()
    {
        $this->db = Connexion::getInstance();
    }

}