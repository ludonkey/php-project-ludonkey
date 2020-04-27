<?php

namespace Entity;

use Entity\User;
use Entity\Language;
use ludk\Utils\Serializer;

class Code
{
    public $id;
    public $title;
    public $content;
    public $description;
    public $creationDate;
    public Language $language;
    public User $user;
    use Serializer;
}