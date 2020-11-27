<?php
require_once 'lib/admin.php';
global $param;

if ($param[0] === 'orders') {
    echo getOrders();
}

if($param[0] === 'add') {
    echo addProduct();
}
