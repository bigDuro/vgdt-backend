<?php
// Get user info takes connection and sql query
function getUsers($conn) {
  require $_SERVER['DOCUMENT_ROOT'] . "/users/sql/index.php";

  $result = $conn->query(getUsersQuery());
  $data = array();

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          array_push($data, $row);
      }
  }

  $conn->close();

  $response['users'] = $data;
  $response['valid'] = true;
  return $response;

}

function handleGetRequest($conn) {
  return json_encode(json_response(200, getUsers($conn)));
}
