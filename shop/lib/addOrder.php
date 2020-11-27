<?php
require_once '../config/connect.php';
global $link;
$userId = $_SESSION['user'];

$sqlInsert ="INSERT INTO orders (`id`, `date`, `summ`) VALUES (NULL, CURRENT_TIMESTAMP, (SELECT SUM(baskets.count * products.price) FROM products LEFT JOIN baskets on products.id = baskets.product_id WHERE status = 0))";

mysqli_begin_transaction($link, MYSQLI_TRANS_START_READ_WRITE);
try {
    mysqli_query($link, $sqlInsert);
    $order_id = mysqli_insert_id($link);
    $sqlUpdate = "UPDATE baskets SET status = 1, order_id = {$order_id} WHERE user_id = {$userId} and status = 0";
    mysqli_query($link, $sqlUpdate);
    mysqli_commit($link);
} catch (Exception $e) {
    mysqli_rollback($link);
    echo $e->getMessage();
}


header('Location: /orders');
exit();

