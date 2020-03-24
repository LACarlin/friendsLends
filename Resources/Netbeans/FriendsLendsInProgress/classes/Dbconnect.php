<?php

class Dbconnect {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "friendslends";

//needsb to be protected
public function connect (){
    
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
    $ooppdo = new PDO($dsn, $this->user, $this->pwd);
    return $ooppdo;
}
}