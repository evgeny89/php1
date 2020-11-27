<?php
require_once '../config/connect.php';
global $link;

$order = (int) $_POST['order'];
$status = (int) $_POST['status'];

if ($_SESSION['admin'] === 0) {
    header('Location: /');
    exit();
}

$sql = "SELECT * FROM orders WHERE id = {$order}";

if (mysqli_num_rows(mysqli_query($link, $sql))) {
    $sql = "UPDATE baskets SET status = {$status} WHERE order_id = {$order}";
    try {
        mysqli_query($link, $sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    echo 'заказ не найден';
}

header('Location: '. $_SERVER['HTTP_REFERER']);
exit();

