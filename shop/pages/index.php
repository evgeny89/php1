<?php
global $link;

if (!empty($_SESSION['user'])) {
    $sql = "SELECT * FROM users WHERE id = '{$_SESSION['user']}'";
    $res = mysqli_fetch_assoc(mysqli_query($link, $sql));
} else {
    $res = null;
}

$content = <<<content
    <h1>SHOP ONLINE</h1>
     <p><h3 style="display: inline-block">{$res['name']}</h3> Добро пожаловать в наш магазин</p>
    
content;

echo $content;

