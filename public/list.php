<?php

$userDao = new \App\UserDao();

$users = $userDao->getAll();

$view = new \App\View();
$view->render("../views/users/list", ['users' => $users, 'title' => 'List of users']);