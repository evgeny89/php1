<?php

$link = mysqli_connect('localhost', 'root', 'root', 'shop');

if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}
