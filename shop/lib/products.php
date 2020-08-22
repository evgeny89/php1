<?php
function getProducts()
{
    global $link;
    $checked = isset($_POST['categories']) ? $_POST['categories'] : [];
    $productList = '<div class="products">';
    $sql = "SELECT * FROM products";

    if (!empty($checked)) {
        $categories_id = implode(', ', $checked);
        $sql = "SELECT * FROM products WHERE category_id IN ({$categories_id})";
    }
    $result = mysqli_query($link, $sql);

    while ($res = mysqli_fetch_assoc($result)) {
        $productList .= <<<card
            <div class="card">
                <h4><a href="/catalog/{$res['id']}">{$res['name']}</a></h4>
                <div>
                    <h5>{$res['price']} ₽</h5>
                    <p>{$res['description']}</p>
                </div>
            </div>
card;

    }
    return $productList . '</div>';
}
