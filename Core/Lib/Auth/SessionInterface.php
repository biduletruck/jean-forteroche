<?php

namespace  Core\Lib\Auth;


interface SessionInterface
{
    public function isValidSession();

    public function addSessionParameter($key, $value);

    public function readSession();

    public function readSessionParameter($key);

    public function deleteSessionParameter($key);

    public function deleteSessionAllParameters();

    public function logOutSession();

    public function setMessage($key, $message);

    public function getMessage();

    public function deleteMessage();

}