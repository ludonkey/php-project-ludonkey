<?php

namespace Entity;

use ludk\Utils\Serializer;

class Language
{
    public $id;
    public $name;
    use Serializer;
}