<?php

/**
 * Class parent untuk class - class lain dalam folder /app/controllers
 */
class Controller
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
}
