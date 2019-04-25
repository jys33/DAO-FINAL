<?php
require 'UserDao.php';
$userDao = new UserDao();

$users = $userDao->getAll();

require '../views/inc/header.phtml';
require '../views/users/list.phtml';
require '../views/inc/footer.phtml';