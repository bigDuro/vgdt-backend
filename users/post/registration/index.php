<?php

  function registerUser($conn, $user) {
    require $_SERVER['DOCUMENT_ROOT'] . "/users/sql/index.php";

    // initializing variables
    $errors = array();

    // REGISTER USER
      // receive all input values from the form
      $email = mysqli_real_escape_string($conn, $user['email']);
      $password = mysqli_real_escape_string($conn, $user['password']);

      // form validation: ensure that the form is correctly filled ...
      // by adding (array_push()) corresponding error unto $errors array
      if (empty($email)) { array_push($errors, "Email is required"); }
      if (empty($password)) { array_push($errors, "Password is required"); }

      // first check the database to make sure
      // a user does not already exist with the same username and/or email
      $result = mysqli_query($conn, getUserCheckQuery($email));
      $user = mysqli_fetch_assoc($result);

      if ($user) {
        if ($user['email'] === $email) {
          array_push($errors, "email already exists");
        }
      }

      // Finally, register user if there are no errors in the form
      if (count($errors) == 0) {

        $new_user = array(
          "email"     => $email,
          "password"     => md5($password)
        );

        $result = $conn->query(getRegisterUserQuery($new_user));

        $response['email'] = $email;
        $response['message'] = "Account created for " . $email;
        $response['valid'] = true;

        return $response;

    }else {
      $response['errors'] = $errors;
      $response['valid'] = false;

      return $response;
    }
    $conn->close();
  }
