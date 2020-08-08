<h5>Задание 3</h5>
<?php

$str = <<<code
    <?php
    \$a = 5;                                    // инициализация переменной a и присвоение ей значения типа integer равный 5
    \$b = '05';                                 // инициализация переменной b и присвоение ей значения типа string равный 05
    var_dump(\$a == \$b);                       // нестрогое сравнение, интерпритатор использует приведение типов строка '05' приводится к числу 5 и оно равно числу в переменной a
    var_dump((int)'012345');                    // срабатывает приведение типов, число не может начинаться с нуля и он опускается.
    var_dump((float)123.0 === (int)123.0);      // получаем false т.к. разные типы данных при строгом сравнении
    var_dump((int)0 === (int)'hello, world');   // если строка начинается с верного числового значения, будет использовано это значение, иначе значением будет 0 (ноль)
code;

echo highlight_string ($str, true);
?>

<h5>Задание 4</h5>

<?php
$str = <<<code
    <?php
    \$title = 'PHP базовый курс';
    \$headerOne = 'Базовый курс PHP';
    \$year = date('d-m-Y');
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?= \$title ?></title>
    </head>
    <body>
        <h1><?= \$headerOne .' ('. \$year .')';?></h1>
    </body>
    </html>
code;

echo highlight_string ($str, true);
?>

<h5>Задание 5</h5>

<?php
    $str = <<<code
    <?php
    \$a = 1;
    \$b = 2;
    
    \$a = [\$a, \$b];
    
    \$b = \$a[0];
    \$a = \$a[1];
    
    echo "\$a / \$b";
code;

echo highlight_string ($str, true);
?>
