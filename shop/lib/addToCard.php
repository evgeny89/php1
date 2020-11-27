<?php
require_once '../config/connect.php';
global $link;

$product = (int)$_GET['id'];
$user = $_SESSION['user'];

$sql = "SELECT * FROM baskets WHERE product_id = '{$product}' and user_id = '{$user}' and status = 0";
$res = mysqli_num_rows(mysqli_query($link, $sql));

if ($res === 0) {
    $sql = "INSERT INTO baskets (user_id, product_id) VALUES ('{$user}', {$product})";
} else {
    $sql = "UPDATE baskets SET count = count + 1 WHERE product_id = '{$product}' and user_id = '{$user}' and status = 0";
}

mysqli_query($link, $sql);
header('Location: /catalog');
exit();
