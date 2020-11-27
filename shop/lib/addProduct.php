<?php
require_once '../config/connect.php';
global $link;
$name = (string)$_POST['name'];
$description = (string)$_POST['description'];
$price = (int)$_POST['price'];
$categories = (int)$_POST['categories'];
$brands = (int)$_POST['brands'];

if ($name == '' || $description == '' || $price == 0 || $brands < 1 || $categories < 1) {
    header('Location: '. $_SERVER['HTTP_REFERER']);
    exit();
}

$sql = "INSERT INTO products (category_id, brand_id, name, price, description) VALUES ({$categories}, {$brands}, '{$name}', {$price}, '{$description}')";
mysqli_query($link, $sql);

header('Location: /catalog');
exit();