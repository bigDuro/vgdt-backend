<?php
require "./helpers/jsonResponse.php";

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'POST':
        echo json_encode( json_response(200, 'Nothing here!'));
        break;
    case 'GET':
        echo json_encode( json_response(200, 'Nothing here!'));
        break;
    default:
        echo "string";;
}
