<?php

/*** создаем массив с вложенным меню
 * @param $arr
 * @return array
 */
function createArrayMenu($arr)
{
    $menuArr = [];

    foreach ($arr as $list) {
        if (!$list['parent_id']) {
            $menuArr[$list['id']] = $list;
        } else {
            $menuArr[$list['parent_id']]['child'][] = $list;
        }
    }

    return $menuArr;
}

/*** генерируем меню сайта из массива меню
 * @param $arr
 * @return string
 */
function buildMenu($arr)
{
    $str = '<ul>' . PHP_EOL;

    foreach ($arr as $links) {
        if (isset($links['child'])) {
            $str .= "<li><a href=\"{$links['link']}\">{$links['name']}</a><ul class=\"sub-menu\">" . PHP_EOL;
            foreach ($links['child'] as $link) {
                $str .= "<li><a href='{$link['link']}'>{$link['name']}</a></li>" . PHP_EOL;
            }
            $str .= '</ul></li>';
        } else {
            $str .= "<li><a href=\"{$links['link']}\">{$links['name']}</a></li>" . PHP_EOL;
        }
    }

    return $str . PHP_EOL;
}

$link = connect();
$sql = "SELECT * FROM `menu`";
$result = mysqli_query($link, $sql);
$res = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo buildMenu(createArrayMenu($res));
mysqli_close($link);

