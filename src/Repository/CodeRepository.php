<?php

namespace Repository;

use framework\Repository\JsonRepository;

class CodeRepository extends JsonRepository
{
    public function __construct()
    {
        $jsonFile = __DIR__ . '/../Resources/codes.json';
        parent::__construct("Entity\Code", $jsonFile);
    }
}
