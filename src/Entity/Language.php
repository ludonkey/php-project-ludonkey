<?php

namespace Entity;

use framework\Utils\Serializer;

class Language
{
    public $id;
    public $name;
    use Serializer;
}