<?php

class Database
{
    protected $dbname       = 'db_flexcms';
    protected $dbuser       = 'root';
    protected $dbpass       = '';
    protected $dbhost       = 'localhost';

    public function __construct()
    {
        try {
            $db = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname, $this->dbuser, $this->dbpass);
            return $db;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}