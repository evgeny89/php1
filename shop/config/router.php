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
    $page = '';
    $layout = file_get_contents('templates/index.html');

    if(!empty($route['path'])) {
        ob_start();
        include "pages/{$route['path']}.php";
        $page = ob_get_clean();
    }

    $menu = menu();

    return str_replace(['{{title}}','{{menu}}', '{{content}}'], [$route['name'], $menu, $page], $layout);
}



