<?php
$operator = $_GET['operator'];
$num1 = (int)$_GET['num1'];
$num2 = (int)$_GET['num2'];
if(!empty($num1) && !empty($num2) && !empty($operator)) {

    if ($num2 === 0 && $operator === '/') {
        echo 'на 0 делить нельзя';
    } else {
        $res = '';
        switch ($_GET['operator']) {
            case '/':
                $res = $num1 / $num2;
                break;
            case '*':
                $res = $num1 * $num2;
                break;
            case '-':
                $res = $num1 - $num2;
                break;
            case '+':
                $res = $num1 + $num2;
                break;
        }
        echo $res;
    }

}
?>
<form action="">
    <input type="number" name="num1" value="<?= $num1 ?>">
    <select name="operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" name="num2" value="<?= $num2 ?>">
    <button>Посчитать</button>
</form>
<br>
<hr>
<br>
<form action="">
    <input type="number" name="num1" value="<?= $num1 ?>">
    <input type="number" name="num2" value="<?= $num2 ?>">
    <button name="operator" value="+">Сложить</button>
    <button name="operator" value="-">Вычесть</button>
    <button name="operator" value="/">Разделить</button>
    <button name="operator" value="*">Умножить</button>
</form>
