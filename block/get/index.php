<?php

// Get user info takes connection and sql query
function getObject($conn) {
  $replace = array('');
  $search = array($_SERVER['DOCUMENT_ROOT']);
  $subject = getcwd();
  $block = str_replace($search, $replace, $subject);

  require $_SERVER['DOCUMENT_ROOT'] . "$block/sql/index.php";

  $result = $conn->query(getBlockServiceQuery("email", "users"));
  $data = array();

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          array_push($data, $row);
      }
  }

  $conn->close();

  $response['services'] = $data;
  $response['valid'] = true;
  return $response;

}

function handleGetRequest($conn) {
  return json_encode(json_response(200, getObject($conn)));
}
