<?php

class AppController
{

    public static function index()
    {
        $title = "My Bibli";

        include VIEWS . "app/home.php";
    }



}

