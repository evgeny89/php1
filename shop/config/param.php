<?php

$param = explode('/', $_GET['page']);

function getAccess() {
    $user = isset($_SESSION['user']) ? 1 : 0;
    $admin = isset($_SESSION['admin']) && $_SESSION['admin'] > 0 ? 1 : 0;
    return $user + $admin;
}
