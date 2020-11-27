<?php
require_once '../config/connect.php';
global $link;

$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];

if (empty($login) || empty($name)) {
    header("Location: /reg");
    exit;
}

if (empty($password) || strlen($password) < 6) {
    header("Location: ../reg/{$login}/{$name}");
    exit;
}

$sql = "SELECT * FROM users WHERE login = {$login}";
$res = mysqli_query($link, $sql);
$num = mysqli_affected_rows($link);

if ($num === 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (login, password, name) VALUE ('{$login}', '{$password}', '{$name}')";
    mysqli_query($link, $sql);
    header('Location: /auth');
    exit();
} else {
    header("Location: ../reg/{$login}/{$name}/error");
    exit();
}


