<?php

namespace  Core\Lib\Auth;


interface UsersInterface
{
    public function ifUserExist($userName);

    public function findUser($username);

    public function addUser($userName, $userPassword, $userLevel);

    public function deleteUser($username);

    public function changeLevelUser($id, $userlvl);

    public function changePasswordUser($id, $password);

}