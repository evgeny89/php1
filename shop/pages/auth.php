<?php
global $param;
?>
<form action="/lib/auth.php" class="form" method="post">
    <div class="block"><span>Login:</span> <input type="text" name="login" placeholder="login" value="<?= $param[0] ?>"></div>
    <div class="block"><span>Password:</span> <input type="password" name="password" placeholder="password"></div>
    <button class="btn">Войти</button>
</form>