<?php

function menu() {
    global $link;
    $menu = '<ul class="menu">';
    $sql = "SELECT * FROM menu";
    $result = mysqli_query($link, $sql);

    while ($res = mysqli_fetch_assoc($result)) {
        $menu .= "<li><a href=\"{$res['path']}\">{$res['name']}</a></li>";
    }
    return $menu . '</ul>';
};

