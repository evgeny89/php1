<?php
require_once '../config/connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];

if(empty($login) || empty($name)) {
    header("Location: /reg");
    exit;
}

if(empty($password) || strlen($password) < 6) {
    header("Location: ../reg/{$login}/{$name}");
    exit;
}

$sql = "INSERT INTO users (login, password, name) VALUE ('{$login}', '{$password}', '{$name}')";
mysqli_query($link, $sql);

header('Location: /');
exit();