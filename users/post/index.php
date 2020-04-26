<?php

require $_SERVER['DOCUMENT_ROOT'] .  "/users/post/profile/index.php";
require $_SERVER['DOCUMENT_ROOT'] .  "/users/post/login/index.php";
require $_SERVER['DOCUMENT_ROOT'] .  "/users/post/logout/index.php";
require $_SERVER['DOCUMENT_ROOT'] .  "/users/post/session/index.php";
require $_SERVER['DOCUMENT_ROOT'] . "/helpers/session.php";

function handlePostRequest($conn) {
	$rest_json = file_get_contents("php://input");
	$_POST = json_decode($rest_json, true);
	if (empty($_POST['type'])) die();

  $type = $_POST['type'];
  switch ($type) {
      case 'registerUser':
          echo json_encode( json_response(200, registerUser($conn, $_POST)));
          break;
			case 'loginUser':
          echo json_encode( json_response(200, loginUser($conn, $_POST, Session)));
          break;
			case 'logoutUser':
          echo json_encode( json_response(200, logoutUser(Session)));
          break;
			case 'isValidSession':
          echo json_encode( json_response(200, isValidSession(Session)));
          break;
			case 'createProfile':
          echo json_encode( json_response(200, createProfile($conn, $_POST)));
          break;
			case 'getProfile':
          echo json_encode( json_response(200, getProfile($conn, $_POST)));
          break;
      default:
          echo "string";;
  }
}
