<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP базовый курс</title>
    <link rel="stylesheet" href="src/style.css">
</head>
<body>
    <div class="container">
        <h1>Базовый курс PHP</h1>
        <div class="lesson">
            <!--h3>Lesson 1</h3-->
            <?php //require_once('./less/less1.php') ?>  <!-- Lesson 1 -->
            <!--h3>Lesson 2</h3-->
            <?php //require_once ('./less/less2.php') ?> <!-- Lesson 2 -->
            <h3>Lesson 3</h3>
            <?php require_once ('./less/less3.php') ?> <!-- Lesson 2 -->
        </div>
        <footer class="footer">
            <?= date('Y')?> &copy;
        </footer>
    </div>
</body>
</html>
