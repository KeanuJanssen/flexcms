<?php

class App
{
    public function __construct()
    {
        $db = new Database;
        $route = new Router;
    }
}