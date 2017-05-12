<?php

namespace  Core\Lib\Auth;

use Core\Lib\DatabaseRepository;

class Users extends DatabaseRepository implements UsersInterface
{

    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = Session::getInstance();
    }

    public function ifUserExist($userName)
    {
        $sql = "SELECT * FROM t_users WHERE username = '" . $userName . "'";
        return $this->db->getQuery($sql)->rowCount();
    }

    public function findUser($userName)
    {
        $sql = "SELECT * FROM t_users WHERE username = '" . $userName . "'";
        return $this->db->getQuery($sql)->fetch(\PDO::FETCH_OBJ);
    }

    public function addUser($userName, $userPassword, $userLevel)
    {
        $sql = "INSERT INTO t_users SET username = :USER_NAME, userpassword = :USER_PASS, userlevel = :USER_LVL ";
        $values = [
            ":USER_NAME" => $userName,
            ":USER_PASS" => password_hash($userPassword, PASSWORD_BCRYPT),
            ":USER_LVL" => $userLevel
        ];
        return $this->db->getPrepare($sql, $values);
    }

    public function deleteUser($username)
    {
        $sql = "DELETE FROM t_users WHERE username = :USER_NAME";
        $values = ["USER_NAME"  => $username];
        return $this->db->getPrepare($sql, $values);
    }

    public function changeLevelUser($username, $userlevel)
    {
        $sql = "UPDATE t_users SET userlevel = :USER_LVL WHERE username = :USER_NAME";
        $array = [
                    ":USER_LVL"     => $userlevel,
                    ":USER_NAME"    => $username
                ];
        return $this->db->getPrepare($sql, $array);
    }

    public function changePasswordUser($username, $password)
    {
        $sql = "UPDATE t_users SET userpassword = :USER_PASS WHERE username = :USER_NAME";
        $array = [
                    ":USER_PASS"    => password_hash($password, PASSWORD_BCRYPT),
                    ":USER_NAME"    => $username
                ];
        return $this->db->getPrepare($sql, $array);
    }

}