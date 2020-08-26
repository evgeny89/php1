<?php

function menu()
{
    global $link;
    $menu = '<ul class="menu">';
    $sql = "SELECT * FROM menu WHERE parent_id = 0";
    $result = mysqli_query($link, $sql);

    while ($res = mysqli_fetch_assoc($result)) {
        $menu .= "<li><a href=\"{$res['path']}\">{$res['name']}</a></li>";
    }
    return $menu . '</ul>';
}

;

function subMenu()
{
    global $link;
    $path = '/' . explode('/', $_GET['page'])[0];

    $menu = '<ul class="menu sub-menu">';
    $sql = "SELECT * FROM menu WHERE parent_id = (SELECT id FROM menu WHERE path = '{$path}')";
    $result = mysqli_query($link, $sql);

    while ($res = mysqli_fetch_assoc($result)) {
        $menu .= "<li><a href=\"{$res['path']}\">{$res['name']}</a></li>";
    }

    return $menu . '</ul>';
}

