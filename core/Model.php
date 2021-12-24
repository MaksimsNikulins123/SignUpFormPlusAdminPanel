<?php

namespace liw\core;

use liw\lib\Db;

abstract class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new Db;
    }
}