<?php
$path = dirname(__DIR__, 1);
require_once($path . '/controllers/connect.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Image upload</title>
    <link rel="stylesheet" href="../src/style.css">
</head>
<body>
<div class="container">
<header class="header">
    <nav class="menu">
        <?php require_once($path . '/pages/menu.php') ?>
    </nav>
</header>
</div>
</body>
</html>
