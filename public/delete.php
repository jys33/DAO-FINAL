<?php

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "You did not pass in an ID.";
    exit;
}

$userDao = new \App\UserDao();
/* Por ahora prescindimos de esté bloque de código
$user = $userDao->findById($_GET['id']);

if ($user === false) {
    echo "User not found!";
    exit;
}
*/

if ($userDao->delete($_GET['id'])) {
    header("Location: /");
    exit;
} else {
    echo "An error occurred";
}
?>