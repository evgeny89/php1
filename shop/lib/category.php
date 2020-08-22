<?php

function category() {
    global $link;
    $checked = isset($_POST['categories']) ? $_POST['categories'] : [];
    $menu = '<form action="" method="post" class="category">';
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($link, $sql);

    while ($res = mysqli_fetch_assoc($result)) {
        $check = in_array($res['id'], $checked) ? 'checked' : '';
        $menu .= "<label><input type=\"checkbox\" name=\"categories[]\" {$check} value=\"{$res['id']}\"> {$res['name']}</label></p>";
    }
    return $menu . '<button class="btn">Выбрать</button></form>';
};