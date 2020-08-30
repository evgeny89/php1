<?php

function menu()
{
    global $link;

    $access = getAccess();
    $menu = '<ul class="menu">';
    $sql = "SELECT * FROM menu WHERE parent_id = 0 and access <= {$access}";
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
    $access = getAccess();

    $path = '/' . explode('/', $_GET['page'])[0];

    $menu = '<ul class="menu sub-menu">';
    $sql = "SELECT * FROM menu WHERE parent_id = (SELECT id FROM menu WHERE path = '{$path}') and access <= {$access}";
    $result = mysqli_query($link, $sql);

    while ($res = mysqli_fetch_assoc($result)) {

        $menu .= "<li><a href=\"{$res['path']}\">{$res['name']}</a></li>";
    }

    return $menu . '</ul>';
}

