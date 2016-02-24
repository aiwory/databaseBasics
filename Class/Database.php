<?php

/**
 * Created by PhpStorm.
 * User: Aigars
 * Date: 20.02.2016
 * Time: 19:44
 */
class Database
{
    protected $server = "localhost";
    protected $dbuser = "root";
    protected $dbpw = "";
    protected $db = "prieksmeti";
    protected $con;

    function __construct() {

        $this->con = new mysqli($this->server,$this->dbuser,$this->dbpw, $this->db);
        $this->con->set_charset("utf8");
    }

}