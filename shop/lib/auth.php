<?php
require_once '../config/connect.php';
global $link;
$login = $_POST['login'];
$password = $_POST['password'];

if (empty($login) || empty($password)) {
    header("Location: /auth");
    exit;
}

$sql = "SELECT * FROM users WHERE login = '{$login}'";
$result = mysqli_query($link, $sql);
$res = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (password_verify($password, $res['password'])) {
    $_SESSION['user'] = $res['id'];
    $_SESSION['admin'] = $res['role'];
}
header('Location: /');
exit();