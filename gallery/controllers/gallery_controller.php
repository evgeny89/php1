<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$path = dirname(__DIR__ . '../');

function filterPhoto($photo)
{
    return preg_match('/^foto-\w+\.jpg$/', $photo) && filesize('../images/' . $photo) > 1024 && mime_content_type('../images/' . $photo) === 'image/jpeg';
}
function addHrefPhoto($photo)
{
    return [
        'filename' => str_replace(['foto-', '.jpg'], '', $photo),
        'href' => './images/' . $photo
    ];
}

$photoArray = scandir($path . '/images');
$photoArray = array_filter($photoArray, 'filterPhoto');
$photoArray = array_map('addHrefPhoto', $photoArray);

http_response_code(200);

echo json_encode($photoArray);
