<?php

namespace Core\Lib;


class Connexion
{


    /*
     * Déclaration de constantes de connexion.
     */
  
    const HOST = 'localhost';
    const DBNAME = 'forteroche';
    const USER = 'root';
    const PASS = 'root'; //Sous les systems unix le password est root ... et vide sous windows.

    /*
     * Instance de PDO
     */
    private $PDOInstance = null;

    /*
     * Instance de Connexion
     */
    static $instance = null;


    /**
     * Connexion constructor.
     */
    public function __construct()
    {
            $this->PDOInstance = new \PDO('mysql:dbname='.self::DBNAME.';charset=utf8;host='.self::HOST,self::USER ,self::PASS,array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            ));
    }

    /**
     * Instanciation de PDO
     * @return Connexion
     */
    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new Connexion();
        }
        return self::$instance;
    }

    public function getExecute($query)
    {
        return $this->PDOInstance->exec($query);
    }

    public function getQuery($query)
    {
        return $this->PDOInstance->query($query);
    }

    public function getPrepare($sql, $array)
    {
        $req = $this->PDOInstance->prepare($sql);
        return $req->execute($array);
    }
}