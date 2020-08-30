<?php

function createOrder()
{
    global $link;

    $basketList = '<table>';
    $totalSum = 0;
    $totalCount = 0;
    $sql = "SELECT products.id, products.name, products.price, products.description, baskets.count FROM baskets LEFT JOIN products ON baskets.product_id = products.id WHERE user_id = '{$_SESSION['user']}' and status = 0";
    $result = mysqli_query($link, $sql);

    if (!mysqli_num_rows($result)) {
        return $basketList .= '<th>корзина пуста</th></table>';
    }

    while ($res = mysqli_fetch_assoc($result)) {
        $basketList .= <<<order
            <tr>
                <td>{$res['name']}</td>
                <td>{$res['price']} руб.</td>
                <td>{$res['count']} шт.</td>
</tr>
order;
        $totalSum += $res['price'] * $res['count'];
        $totalCount += $res['count'];
    }

    $basketList .= "<tr><td>итого: </td><td>{$totalSum} руб.</td><td>{$totalCount} шт.</td></tr></table>";
    return $basketList .= "<a href=\"/lib/addOrder.php\">Оформить</a>";
}

function getOrdersAll()
{
    global $link;
    $sql = "SELECT orders.*, SUM(baskets.count) as count FROM orders LEFT JOIN baskets on orders.id = baskets.order_id WHERE user_id = {$_SESSION['user']} GROUP BY baskets.order_id";
    $result = mysqli_query($link, $sql);

    $orders = '<table>';

    while ($res = mysqli_fetch_assoc($result)) {
        $orders .= <<<order
            <tr>
                <td><a href="/order/{$res['id']}">Заказ от {$res['date']}</a></td>
                <td>Сумма: {$res['summ']} руб.</td>
                <td>Кол-во товаров: {$res['count']}</td>
            </tr>
order;

    }

    return $orders .= '</table>';
}

function getOrderOne() {
    global $param, $link;

    $order = '<table>';
    $totalSum = 0;
    $totalCount = 0;
    $status = '';
    $sql = "SELECT products.id, products.name, products.price, products.description, baskets.count, state.name as status FROM baskets LEFT JOIN products ON baskets.product_id = products.id LEFT JOIN state ON baskets.status = state.id WHERE user_id = '{$_SESSION['user']}' and order_id = {$param[0]}";
    $result = mysqli_query($link, $sql);

    if (!mysqli_num_rows($result)) {
        return $order .= '<th>не верные данные заказа</th></table>';
    }

    while ($res = mysqli_fetch_assoc($result)) {
        $order .= <<<order
            <tr>
                <td>{$res['name']}</td>
                <td>{$res['price']} руб.</td>
                <td>{$res['count']} шт.</td>
</tr>
order;
        if (empty($status)) {
            $status = $res['status'];
        }
        $totalSum += $res['price'] * $res['count'];
        $totalCount += $res['count'];
    }

    $order .= "<tr><td>итого: </td><td>{$totalSum} руб.</td><td>{$totalCount} шт.</td></tr></table>";
    $order .= "<p>Стратус: {$status}</p>";
    return $order .= "<a href=\"{$_SERVER["HTTP_REFERER"]}\">Назад</a>";
}