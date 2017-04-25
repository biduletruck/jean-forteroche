<?php

namespace  Core\Lib\Auth;


interface AuthInterface
{
    public function login($login,$Pass);

    public function logout();

    public function hashPassword($pass);

    public function restrict();

}