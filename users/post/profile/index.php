<?php

  function createProfile($conn, $user) {
    require $_SERVER['DOCUMENT_ROOT'] . "/users/sql/index.php";

    // initializing variables
    $errors = array();

    // REGISTER USER
    // receive all input values from the form
    $email = mysqli_real_escape_string($conn, $user['email']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($email)) { array_push($errors, "Email is required"); }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $result = mysqli_query($conn, getUserProfileCheckQuery($email));
    $userResults = mysqli_fetch_assoc($result);

    if ($userResults) {
      if ($userResults['email'] === $email) {
        $addresses = (string) $user['addresses'];

        // Update user profile
        $result = $conn->query(getUpdateUserProfileQuery($user, $email));

        $response['message'] = "Updated Profile";
        $response['valid'] = true;

        return $response;

      }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
      $addresses = (string) $user['addresses'];

      $new_user = array(
        "firstname" => $user['firstname'],
        "lastname"  => $user['lastname'],
        "email"     => $email,
        "address"   => $user['address'],
        "phone"   => $user['phone'],
        "birthday"   => $user['birthday'],
        "ssn"   => $user['ssn'],
        "goals"   => $user['goals'],
        "serviceID"  => $user['serviceID'],
      );

      $result = $conn->query(getCreateUserProfileQuery($new_user, $addresses));

      $response['message'] = "Created Profile";
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

  function getProfile($conn, $user) {
    require $_SERVER['DOCUMENT_ROOT'] . "/users/sql/index.php";
    $email = mysqli_real_escape_string($conn, $user['email']);
    $result = $conn->query(getUserProfileQuery($email));
    $data = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    }

    $response['records'] = $data;
    $response['valid'] = true;

    $conn->close();
    return $response;
  }
