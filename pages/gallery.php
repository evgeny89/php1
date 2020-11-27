<?php

$link = connect();
$sql = "SELECT gallery.id, gallery.name, gallery.path, gallery.date_create, gallery.views, gallery.size, users.name as user_name FROM `gallery` LEFT JOIN `users` ON gallery.athor_id = users.id ORDER BY `views` DESC";
$result = mysqli_query($link, $sql);
$res = mysqli_fetch_all($result, 1);

ob_start();
require_once('../template/items.html');
$item = ob_get_clean();

foreach ($res as $val) {
    $card = $item;
    $img = str_replace(['{{id}}', '{{name}}', '{{path}}', '{{date_create}}', '{{views}}', '{{size}}', '{{user_name}}'], $val, $card);
    echo $img . PHP_EOL;
}

