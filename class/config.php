<?php

class dbconfig{
    
        
    protected $host = "localhost"; //host
    protected $dbname = "kpko"; //database
    protected $user = "root"; //username
    protected $pass = ""; //password

    protected $connection;
    public $error;

    public function __construct(){
        try{
            $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOExceptio $e){
            // echo "Koneksi Error :".$e->getMessage();
        }
    }
}


