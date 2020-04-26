<?php

  function createBlock($conn, $block) {
    require $_SERVER['DOCUMENT_ROOT'] . "/block/sql/index.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/helpers/checkIfTableExist.php";

    // initializing variables
    $errors = array();

    // REGISTER BLOCK
    // receive all input values from the form
    $table = mysqli_real_escape_string($conn, $block['table']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($table)) {
      array_push($errors, "Table is required");
    }

    // first check to see if table exists
    $tableExist = table_exists($conn, $table);




    // if table doesn't exist create new table
    if(!$tableExist) {
      createTable($conn, $table, $block);
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    // $result = mysqli_query($conn, getUserProfileCheckQuery($email));
    // $blockResults = mysqli_fetch_assoc($result);

    // if ($blockResults) {
    //   if ($blockResults['email'] === $email) {
        // $addresses = (string) $block['addresses'];
        //
        // // Update user profile
        // $result = $conn->query(getUpdateUserProfileQuery($block, $email));
        //
        // $response['message'] = "Updated Profile";
        // $response['valid'] = true;
        //
        // return $response;

      // }
    // }

    // Finally, Create Block if there are no errors in the form
    if (count($errors) == 0 && $tableExist && $tableExist) {
      $result = $conn->query(getCreateBlockServiceQuery($block, $table));
      $response['message'] = "Created block in " . $table . " table.";
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
