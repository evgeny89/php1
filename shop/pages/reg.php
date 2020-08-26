<?php
global $param;
?>
<form action="/lib/reg.php" class="form" method="post">
    <?php
    if (isset($param[2]) && $param[2] === 'error') {
        echo '<h4>Такой логин уже занят</h4>';
    }
    ?>
    <div class="block"><span>Login:</span> <input type="text" name="login" placeholder="login" value="<?= $param[0] ?>">
    </div>
    <div class="block"><span>Password:</span> <input type="password" name="password" placeholder="password"></div>
    <div class="block"><span>Имя:</span> <input type="text" name="name" placeholder="name" value="<?= $param[1] ?>">
    </div>
    <button class="btn">Зарегистроваться</button>
</form>