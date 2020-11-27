<?php

function getRoute() {
    global $link, $param;
    $default = ['path' => '', 'name' => 'Главная'];


    if(empty($_GET['page'])) {
        return $default;
    }

    $path = array_shift($param);

    $sql = "SELECT * FROM router WHERE path = '{$path}' LIMIT 1";
    $result = mysqli_query($link, $sql);
    return mysqli_num_rows($result) ? mysqli_fetch_assoc($result) : $default;
}

function getPage() {
    $route = getRoute();
    $layout = file_get_contents('templates/index.html');

    if(!empty($route['path'])) {
        ob_start();
        include_once "pages/{$route['path']}.php";
        $page = ob_get_clean();
    } else {
        ob_start();
        include_once "pages/index.php";
        $page = ob_get_clean();
    }

    $menu = menu();

    if (!empty($_SESSION['user'])) {
        $menu = str_replace('<li><a href="/auth">Вход</a></li>', '', $menu);
    } else {
        $menu = str_replace('<li><a href="/lib/logout.php">Выход</a></li>', '', $menu);
    }

    $subMenu = subMenu();

    return str_replace(['{{title}}','{{menu}}', '{{subMenu}}', '{{content}}'], [$route['name'], $menu, $subMenu, $page], $layout);
}



