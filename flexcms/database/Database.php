<?php

class Database
{
    private $dbname     = DB_NAME;
    private $user       = DB_USER;  
    private $pass       = DB_PASS;
    private $host       = DB_HOST;
    private $dbh;  
    private $error; 

    public function __construct()
    {
        // Set DSN  
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options  
        $options = array(  
            PDO::ATTR_PERSISTENT => true,  
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  
            );  
        
            try 
            {  
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);  
            } catch (PDOException $e) 
            {  
            $this->error = $e->getMessage();  
            } 
    }
}