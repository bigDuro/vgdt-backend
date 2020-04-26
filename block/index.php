<?php

$parentPath = basename(dirname(__FILE__));
require $_SERVER['DOCUMENT_ROOT'] . "/connect.php";
require $_SERVER['DOCUMENT_ROOT'] . "/helpers/jsonResponse.php";
require $_SERVER['DOCUMENT_ROOT'] . "/$parentPath/get/index.php";
require $_SERVER['DOCUMENT_ROOT'] . "/$parentPath/post/index.php";

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
