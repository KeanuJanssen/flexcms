<?php

class HomeController extends Controller
{
    public static function index()
    {
        self::view('home/view');
    }

    public static function contact()
    {
        self::view('home/contact');
    }
}