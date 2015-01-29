<?php

class Controller_Json
{
    public function hide_cookie_box()
    {
        session_start();
        $_SESSION['hide_cookie_box'] = true;
    }
}

$action = !empty($_GET['action']) ? $_GET['action'] : 'index';

$controller = new Controller_Json();
$controller->{$action}();