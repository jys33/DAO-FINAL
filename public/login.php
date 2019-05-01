<?php

if (isset($_POST) && sizeof($_POST) > 0) {
    $userDao = new \App\UserDao();
    
}

$view = new \App\View();
$view->render("../views/users/signin-form", ['title' => 'Sign in']);