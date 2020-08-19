<?php

$id = (int)$_GET['id'];
$link = connect();
$sql = "SELECT * FROM `gallery` WHERE `id` = {$id}";
$result = mysqli_query($link, $sql);
$res = mysqli_fetch_assoc($result);

ob_start();
require_once('../template/item.html');
$item = ob_get_clean();

echo str_replace(['{{name}}', '{{path}}'], [$res['name'], $res['path']], $item);

$views = $res['views'] + 1;
$update = "UPDATE `gallery` SET `views` = {$views}  WHERE `id` = {$id}";
mysqli_query($link, $update);
