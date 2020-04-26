<?php

function createTable($conn, $block) {
  require $_SERVER['DOCUMENT_ROOT'] . "/sql/index.php";
  // initializing variables
  $errors = array();
  // echo "Create Table!";
  $table = mysqli_real_escape_string($conn, $block['table']);

  if (empty($table)) {
    array_push($errors, "Table is required");
  }
  // createTableQuery($table, $block);
  // $result = $conn->query(createTableQuery($table, $block));
  // $result = $conn->query(getCreateBlockServiceQuery($block, "users"));
  // echo "createTable " . $result . $block;

  // Finally, Create Block if there are no errors in the form
  if (count($errors) == 0) {
    $result = $conn->query(createTableQuery($table, $block));
    $response['message'] = "Created new Table: " . $table;
    $response['valid'] = true;

    return $response;
  }
  else {
    $response['errors'] = $errors;
    $response['valid'] = false;
    return $response;
  }

  $conn->close();
}
