<?php

require_once "core/database.php";

abstract class Model{
    protected $pdo;
    public function __construct(){
        $this->pdo = getPdo();
    }
}