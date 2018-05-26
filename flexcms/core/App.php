<?php

class App
{
    public function __construct()
    {
        $db = new Database;

        $results = $db->query('SELECT * FROM `users`', PDO::FETCH_ASSOC);
        var_dump($results);
        die;

        $route = new Router;
    }
}