<?php

function getBasket()
{
    global $link;
    $basketList = '<div class="products">';
    $sql = "SELECT products.id, products.name, products.price, products.description, baskets.count FROM baskets LEFT JOIN products ON baskets.product_id = products.id WHERE user_id = '{$_SESSION['user']}' and status = 0";
    $result = mysqli_query($link, $sql);

    while ($res = mysqli_fetch_assoc($result)) {
        $basketList .= <<<card
            <div class="card">
                <h4 class="title-card">
                    <a href="/catalog/{$res['id']}">{$res['name']}</a>
                    <a href="/lib/delOfCard.php?id={$res['id']}">delete</a>
                </h4>
                <div>
                    <h5>{$res['price']} ₽</h5>
                    <p>{$res['description']}</p>
                    <p>добавлено: {$res['count']} шт.</p>
                </div>
            </div>
card;

    }
    return $basketList . '</div>';
}
