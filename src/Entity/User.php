<?php

namespace Entity;

use framework\Utils\Serializer;

class User
{
    public $id;
    public $nickname;
    public $password;
    use Serializer;
}