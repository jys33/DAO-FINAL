<?php
require 'UserDao.php';

if (isset($_POST) && sizeof($_POST) > 0) {
    $userDao = new UserDao();
    if(!array_key_exists('created',$_POST)) {
    	$_POST['created'] = date("Y-m-d H:i:s");
    }
    if(!array_key_exists('modified',$_POST)) {
    	$_POST['modified'] = date("Y-m-d H:i:s");
    }
    $_POST['password'] = password_hash($_POST['password'] . 'Nh-Tw3M-cRW)', PASSWORD_DEFAULT);
    if ($userDao->add($_POST)) {
    	header("Location: /");
    	exit;
    }
}
require '../views/inc/header.phtml';
require '../views/users/add.phtml';
require '../views/inc/footer.phtml';
