<?php

namespace Web\Admin\Model;

use Core\Lib\Auth\Users;
use Core\Lib\DatabaseRepository;

class ModelUsers extends DatabaseRepository
{
    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = new Users();
    }

    public function findUsers()
    {
        return $this->db->getQuery('SELECT * FROM t_users')->fetchAll(\PDO::FETCH_OBJ);
    }

    public function addUserIfNotExist($username, $userpassword, $userlevel = 1000)
    {
        if($this->user->ifUserExist($username) === 0)
        {
            $this->user->addUser($username, $userpassword, $userlevel);
            return true;
        }
        return false;
    }

    public function ChangeUserPasswordIfNotSame($username, $password)
    {
        if($this->user->ifUserExist($username) === 1)
        {
            $this->user->changePasswordUser($username, $password);
            return true;
        }
        return false;
    }

    public function deleteUserIfExist($username)
    {
        if($this->user->ifUserExist($username) === 1)
        {
            $this->user->deleteUser($username);
            return true;
        }
        return false;
    }

}