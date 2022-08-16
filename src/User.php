<?php

namespace Src;

class User
{
    public $login;

    public $name;

    public function __construct($name, $login)
    {
        $this->name = $name;
        $this->login = $login;
    }

}