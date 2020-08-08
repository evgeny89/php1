<?php

// задание 1

$a = mt_rand(-20, 20);
$b = mt_rand(-20, 20);
$res = null;

if ($a >= 0 && $b >= 0) {
    $res = $a - $b;
} else if ($a < 0 && $b < 0) {
    $res = $a * $b;
} else {
    $res = $a + $b;
}

echo '<h5>Задание 1</h5>';
echo "\$a = {$a}, \$b = {$b}, результат: {$res}";

// задание 2

$a = mt_rand(0, 15);
$res = null;

switch ($a) {
    case 0:
        $res .= '0, ';
    case 1:
        $res .= '1, ';
    case 2:
        $res .= '2, ';
    case 3:
        $res .= '3, ';
    case 4:
        $res .= '4, ';
    case 5:
        $res .= '5, ';
    case 6:
        $res .= '6, ';
    case 7:
        $res .= '7, ';
    case 8:
        $res .= '8, ';
    case 9:
        $res .= '9, ';
    case 10:
        $res .= '10, ';
    case 11:
        $res .= '11, ';
    case 12:
        $res .= '12, ';
    case 13:
        $res .= '13, ';
    case 14:
        $res .= '14, ';
    case 15:
        $res .= '15';
}

echo '<h5>Задание 2</h5>';
echo "\$a = {$a}, результат: {$res}";

// задание 3

function sum($a, $b)
{
    return $a + $b;
}

function sub($a, $b)
{
    return $a - $b;
}

function div($a, $b)
{
    return round($a / $b, 2);
}

function mul($a, $b)
{
    return $a * $b;
}

// задание 4

function mathOperation($arg1, $arg2, $operation)
{
    $result = null;
    switch ($operation) {
        case '+':
            $result = sum($arg1,$arg2);
            break;
        case '-':
            $result = sub($arg1,$arg2);
            break;
        case '/':
            $result = div($arg1,$arg2);
            break;
        case '*':
            $result = mul($arg1,$arg2);
            break;
        default:
            $result = sum($arg2, $arg1);
    }

    return $result;
}

$a = mt_rand(1, 20);
$b = mt_rand(1, 20);
$operationString = '+-*/';
$operationSing = str_shuffle($operationString)[0];
$res = mathOperation($a, $b, $operationSing);

echo '<h5>Задание 4 (используем функции Задания 3)</h5>';
echo "\$a = {$a}, \$b = {$b}, \$operationSing = {$operationSing}, результат: {$res}";

// задание 6

function power($val, $pow)
{
    if ($pow === 1) return $val;
    return $val * power($val, $pow - 1);
}

$a = mt_rand(2, 10);
$b = mt_rand(2, 10);

echo '<h5>Задание 6</h5>';
echo "\$val = {$a}, \$pow = {$b}, резальтат: ". power($a, $b);

// задание 7

$hours = date('H');
$minutes = date('i');

function timeToString($num, $type = 'hour')
{
    if ($num > 10 && $num < 20) {
        return $type === 'hour' ? 'часов' : 'минут';
    }

    $residue = $num % 10;
    switch ($residue) {
        case 1:
            return $type === 'hour' ? 'час' : 'минута';
        case 2:
        case 3:
        case 4:
            return $type === 'hour' ? 'часа' : 'минуты';
        default:
            return $type === 'hour' ? 'часов' : 'минут';
    }
}

echo '<h5>Задание 7</h5>';
echo "{$hours} ". timeToString($hours) ." {$minutes} ". timeToString($minutes, 'min');