<?php

// задание 1*
function logger()
{
    $dataTime = date('d.m.Y h:i:s');
    file_put_contents('./src/log.txt', 'file: index.php / time: ' . $dataTime . PHP_EOL, FILE_APPEND);
}

logger();

// задание 2*
function filterFile($photo)
{
    return preg_match('/^log\d+.txt$/', $photo);
}

if (count(file('src/log.txt')) === 10) {
    $x = count(array_filter(scandir('src/logs'), 'filterFile'));
    copy('src/log.txt', 'src/logs/log' . $x . '.txt');
    unlink('./src/log.txt');
}

// задание 3*
function scanDirectory($path)
{
    $resArray = [];
    $scanArray = scandir($path);
    foreach ($scanArray as $value) {
        if ($value === '..' || $value === '.') {
            continue;
        }
        if (is_dir($path . '/' . $value)) {
            $resArray[$value] = scanDirectory($path . '/' . $value);
        } else {
            $resArray[$value] = 'file';
        }
    }
    return $resArray;
}

var_dump(scanDirectory('.'));

// задание 4*
$menu = [
    'Главная',
    'Новости' => [
        'Новости о политике' => [
            'В России',
            'В мире'
        ],
        'Новости о спорте' => [
            'В России',
            'В мире',
            'Любительские соревнования',
            'Новости спортивных организаций'
        ],
        'Новости о мире'
    ],
    'Контакты',
    'Справка'
];

function buildMenu($arr, $recursive = 0)
{
    $str = '<ul>';

    foreach ($arr as $key => $value) {

        $str .= '<li style="margin-left:' . $recursive . 'em;"><a>';

        if (is_array($value)) {
            $str .= $key . '</a>' . buildMenu($value, ++$recursive);
            $recursive--;
        } else {
            $str .= $value . '</a>';
        }
    }

    $str .= '</li></ul>';

    return $str;
}

echo buildMenu($menu);
