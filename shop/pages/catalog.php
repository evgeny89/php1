<?php
require_once 'lib/category.php';
require_once 'lib/products.php';
require_once 'lib/item.php';
global $param;
?>
<div class="catalog">
    <? if(empty($param)): ?>
    <aside class="categories">
        <?= category() ?>
    </aside>
    <main class="products">
        <?= getProducts() ?>
    </main>
    <? else: ?>
    <div class="product">
        <?= getItem() ?>
    </div>
    <? endif; ?>
</div>
