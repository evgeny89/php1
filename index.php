<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP базовый курс</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            padding: 15px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #e6f4f5;
        }
        .lesson {
            border: 1px solid #209bbf;
            padding: 15px;
            flex-grow: 1;
        }

        h5 {
            padding: 20px 10px 10px 10px;
            margin-top: 10px;
            border-top: 1px solid #80d9e8;
        }
        .footer {
            padding: 15px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Базовый курс PHP</h1>
        <div class="lesson">
            <!--h3>Lesson 1</h3-->
            <?php //require_once('./less/less1.php') ?>  <!-- Lesson 1 -->
            <h3>Lesson 2</h3>
            <?php require_once ('./less/less2.php') ?> <!-- Lesson 2 -->
        </div>
        <footer class="footer">
            <?= date('Y')?> &copy;
        </footer>
    </div>
</body>
</html>
