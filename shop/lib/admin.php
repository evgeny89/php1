<?php

function getOrders()
{
    global $link;
    $sql = "SELECT baskets.user_id, baskets.count, baskets.order_id, baskets.status as state_id, users.name as user, orders.date, orders.summ FROM baskets LEFT JOIN users on baskets.user_id = users.id LEFT JOIN orders on baskets.order_id = orders.id WHERE baskets.order_id is not null ORDER BY baskets.order_id DESC";
    $result = mysqli_query($link, $sql);
    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $res = array_reduce($res, 'reduce_cb', []);

    $orders = '<table><th>заказ</th><th>сумма</th><th>кол-во товаров</th><th>заказчик</th><th>статус</th>';

    foreach ($res as $key => $val) {
        $orders .= <<<order
                <tr class="order">
                    <td><a href="/order/{$key}">От {$val['date']}</a></td>
                    <td>{$val['summ']} руб.</td>
                    <td>{$val['count']}</td>
                    <td>{$val['user']}</td>
order;
        $orders .= " <td>" . changeStatus($val['state_id'], $key) . "</td></tr>";
    }


    return $orders .= '</table>';
}

function addProduct() {

    $categories = getSelect('categories');
    $brands = getSelect('brands');

    $form = <<<add
        <form action="/lib/addProduct.php" method="post" class="add-product">
            <input type="text" name="name" placeholder="введите название товара">
            <input type="text" name="description" placeholder="введите описание">
            <input type="number" name="price" placeholder="введите цену">
            {$categories}
            {$brands}
            <button class="btn">Сохранить</button>
add;

    return $form .= '</form>';
}

function reduce_cb($res, $item)
{
    if (isset($res[$item['order_id']])) {
        $res[$item['order_id']]['count'] += $item['count'];
    } else {
        $res[$item['order_id']] = $item;
        $res[$item['order_id']]['count'] = (int)$res[$item['order_id']]['count'];
        $res[$item['order_id']]['summ'] = (int)$res[$item['order_id']]['summ'];
        $res[$item['order_id']]['user_id'] = (int)$res[$item['order_id']]['user_id'];
        unset($res[$item['order_id']]['order_id']);
    }
    return $res;
}

function changeStatus($id, $key) {
    global $link;

    $sql = "SELECT * FROM state";
    $res = mysqli_fetch_all(mysqli_query($link, $sql), MYSQLI_ASSOC);

    $form = "<form method='post' action='/lib/changeStatus.php'><input type='hidden' name='order' value='{$key}'><select name='status'>";
    foreach ($res as $val) {
        $form .= "<option value='{$val['id']}'";
        if ($id === $val['id'])
        {
            $form .= "selected>{$val['name']}(текущий)</option>";
        } else {
            $form .=">{$val['name']}</option>";
        }

    }

    return $form .= "</select><button>изменить</button></form>";
}

function getSelect ($name) {
    global $link;
    $sql = "SELECT * FROM {$name}";
    $res = mysqli_fetch_all(mysqli_query($link, $sql), MYSQLI_ASSOC);
    $select = "<select name=\"{$name}\">";

    foreach ($res as $val) {
            $select .= "<option value='{$val['id']}'>{$val['name']}</option>";
    }

    return $select .= "</select>";
}
