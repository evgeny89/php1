<?php
require_once '../config/connect.php';
global $link;

$sql = "SELECT count FROM baskets WHERE product_id = '{$_GET['id']}' and status = 0";
$res = mysqli_fetch_assoc(mysqli_query($link, $sql));

if ($res['count'] > 1) {
    $sql = "UPDATE baskets SET count = count - 1 WHERE product_id = '{$_GET['id']}' and status = 0";
} else {
    $sql = "DELETE FROM baskets WHERE product_id = '{$_GET['id']}' and status = 0";
}

mysqli_query($link, $sql);
header('Location: /basket');
exit();
