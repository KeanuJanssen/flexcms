<?php

class Controller
{
    public static function view($path)
    {
        require 'app/views/' . $path . '.php';
    }
}