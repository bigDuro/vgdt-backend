<?php
require $_SERVER['DOCUMENT_ROOT'] .  "/utils/table/index.php";
require $_SERVER['DOCUMENT_ROOT'] .  "/block/post/block/index.php";
require $_SERVER['DOCUMENT_ROOT'] . "/helpers/session.php";

function handlePostRequest($conn) {
	$rest_json = file_get_contents("php://input");
	$_POST = json_decode($rest_json, true);
  $type = $_POST['type'];
  switch ($type) {
			case 'createBlock':
          echo json_encode( json_response(200, createBlock($conn, $_POST)));
          break;
      case 'createTable':
          echo json_encode( json_response(200, createTable($conn, $_POST)));
          break;
      default:
          echo "string";;
  }
}
