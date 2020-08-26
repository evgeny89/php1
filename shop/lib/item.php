<?php

function buildComments() {
    global $param, $link;

    $sql = "SELECT comments.description, comments.date, shop.users.name, shop.users.id FROM comments LEFT JOIN users ON comments.athor_id = users.id WHERE product_id = '{$param[0]}'";
    $comments = mysqli_query($link, $sql);
    $str = '';
    while ($comment = mysqli_fetch_assoc($comments)) {
        $str .= <<<comm
            <div class="comm">
                <h4><a href="/users/{$comment['id']}">{$comment['name']}</a></h4>
                <p>{$comment['date']}</p>
                <p>{$comment['description']}</p>
            </div>
comm;
    }

    $addCommentForm = <<<form
        <form class="form comment" method="post" action="/lib/addComment.php">
            <input type="hidden" name="product" value="{$param[0]}">
            <input type="hidden" name="author" value="{$_SESSION['user']}"> <!-- потом добавить реального автора -->
            <div class="block"><textarea name="comment" class="textarea" placeholder="оставте отзыв" cols="50" rows="6" maxlength="350"></textarea></div>
            <button class="btn">Отправить</button>
        </form>
form;

    return $str . $addCommentForm;
}

function getItem() {
    global $param, $link;

    $sql = "SELECT * FROM products WHERE id = {$param[0]} LIMIT 1";
    $res = mysqli_query($link, $sql);
    $item = mysqli_fetch_assoc($res);

    $itemCard = <<<item
        <div class="item">
           <div class="card">
                <h4 class="title-card"><span>{$item['name']}</span> <a href="/lib/addToCard.php?id={$item['id']}">add to card</a></h4>
                <div>
                    <h5>{$item['price']} ₽</h5>
                    <p>{$item['description']}</p>
                </div>
            </div>
            <div class="comments">
                <h5>Коментарии:</h5>
                {{comments}}
            </div>
        </div>
item;


    $commentsList = buildComments();

    return str_replace('{{comments}}', $commentsList, $itemCard);
}