<?php
require_once '../config/connect.php';
global $link;

$comment = $_POST['comment'];
$author = $_POST['author'];
$product = $_POST['product'];

if(!empty($comment) && !empty($author) && !empty($product)) {
    $sql = "INSERT INTO comments (athor_id, product_id, description) VALUES ({$author}, {$product}, '{$comment}')";
    mysqli_query($link, $sql);
}
    header('Location: /catalog/1');
    exit();
