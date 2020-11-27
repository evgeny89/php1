<?php
global $param;
?>
<form action="/lib/reg.php" class="form" method="post">
    <div class="block"><span>Login:</span> <input type="text" name="login" placeholder="login" value="<?= $param[0] ?>"></div>
    <div class="block"><span>Password:</span> <input type="password" name="password" placeholder="password"></div>
    <div class="block"><span>Имя:</span> <input type="text" name="name" placeholder="name" value="<?= $param[1] ?>"></div>
    <button class="btn">Зарегистроваться</button>
</form>