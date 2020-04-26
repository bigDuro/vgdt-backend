<?php
require $_SERVER['DOCUMENT_ROOT'] . "/connect.php";
require $_SERVER['DOCUMENT_ROOT'] . "/helpers/jsonResponse.php";
require $_SERVER['DOCUMENT_ROOT'] . "/users/post/index.php";
require $_SERVER['DOCUMENT_ROOT'] . "/users/get/index.php";

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'POST':
        echo handlePostRequest($conn);
        break;
    case 'GET':
        echo handleGetRequest($conn);
        break;
    default:
        echo "string";
}
