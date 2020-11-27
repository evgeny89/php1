<?php

// задание 1
echo '<h5>задание 1</h5>';

$num = 0;
while ($num <= 100) {
    if(!($num % 3)) echo $num . '<br>';
    $num++;
}

//задание 2

echo '<h5>задание 2</h5>';

$num = 0;
do {
    if (!$num) {
        echo $num . ' - ноль<br>';
    } else {
        echo $num % 2 ? $num .' - четное число<br>' : $num .' - нечетное число<br>';
    }
    $num++;
} while ($num <= 10);

//задание 3
echo '<h5>задание 3</h5>';

$regions = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Всеволожск',
        'Павловск',
        'Кронштадт'
    ],
    'Рязанская область' => [
        'Касимов',
        'Михайлов',
        'Новомичуринск'
    ],
    'Ставропольский край'
];

foreach ($regions as $key => $region) {
    if(is_array($region)) {
        echo $key . ':<br>';
        echo '<pre>   ' . implode(', ', $region) . '</pre>';
        echo '<br>';
    } else {
        echo $region . '<br>';
    }
}

//задание 4
echo '<h5>задание 4</h5>';

$text = 'Написать функцию транслитерации строк. Test';

$translateArray = [
    'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
    'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
    'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
    'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
    'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
    'ш' => 'sh',   'щ' => 'sch',  'ь' => '\'',     'ы' => 'y',    'ъ' => '\'',
    'э' => 'e',    'ю' => 'yu',   'я' => 'ya',

    'А' => 'A',    'Б' => 'B',    'В' => 'V',    'Г' => 'G',    'Д' => 'D',
    'Е' => 'E',    'Ё' => 'E',    'Ж' => 'Zh',   'З' => 'Z',    'И' => 'I',
    'Й' => 'Y',    'К' => 'K',    'Л' => 'L',    'М' => 'M',    'Н' => 'N',
    'О' => 'O',    'П' => 'P',    'Р' => 'R',    'С' => 'S',    'Т' => 'T',
    'У' => 'U',    'Ф' => 'F',    'Х' => 'H',    'Ц' => 'C',    'Ч' => 'Ch',
    'Ш' => 'Sh',   'Щ' => 'Sch',  'Ь' => '\'',     'Ы' => 'Y',    'Ъ' => '\'',
    'Э' => 'E',    'Ю' => 'Yu',   'Я' => 'Ya'
];

function translating($str, $translate)
{
    $strArray = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
    foreach ($strArray as &$val) {
        $val = isset($translate[$val]) ? $translate[$val] : $val;
    }
    return implode($strArray);
}
echo $text . '<br>';
echo translating($text, $translateArray);

//задание 5
echo '<h5>задание 5</h5>';

$text = 'Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.';

function replaceSpace($str)
{
    $strArray = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
    foreach ($strArray as &$val) {
        $val = $val === ' ' ? '_' : $val;
    }
    return implode($strArray);
}

echo $text . '<br>';
echo replaceSpace($text);

//задание 6
echo '<h5>задание 6</h5>';

echo '<a href="../src/index.php">шаблон</a>';

//задание 7
echo '<h5>задание 7</h5>';

for($i = 0; $i < 10; print $i, $i++) {}

//задание 8
echo '<h5>задание 8</h5>';

function filter($str)
{
    return preg_match('/^К/', $str);
}

foreach ($regions as $key => $region) {
    if(is_array($region)) {
        echo $key . ':<br><pre>   ';

        $region = array_filter($region, 'filter');
        echo implode(', ', $region);

        echo '</pre><br>';
    } else {
        echo $region . '<br>';
    }
}

//задание 9
echo '<h5>задание 9</h5>';

$text = 'аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах';

function ulrEncoding($str, $translate)
{
    $strArray = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
    foreach ($strArray as &$val) {
        $val = isset($translate[$val]) ? $translate[$val] : $val;
        $val = $val === ' ' ? '_' : $val;
    }
    return implode($strArray);
}

echo $text . '<br>';
echo ulrEncoding($text, $translateArray);

//задание 10
echo '<h5>задание 10</h5>';

$strTable = '<table>';

for($i = 0; $i <= 10; $i++) {
    $strTable .= '<tr>';

    for($j = 0; $j <= 10; $j++) {
        if($i === 0 && $j === 0) {
            $strTable .= "<td></td>";
            continue;
        }

        if($i === 0) {
            $strTable .= "<td>{$j}</td>";
        }

        if($j === 0) {
            $strTable .= "<td>{$i}</td>";
        }

        if ($j !== 0 && $i !== 0) {
            $strTable .= "<td>" . $i * $j . "</td>";
        }
    }

    $strTable .= '</tr>';
}

echo $strTable . '</table>';
