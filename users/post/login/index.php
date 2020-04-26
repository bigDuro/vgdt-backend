<?php
  function loginUser($conn, $data, $_session) {
    $session = $_session::getInstance();
    $email = $data['email'];
    $password = md5($data['password']);
  	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $results = $conn->query($sql);

    if (mysqli_num_rows($results) == 1) {
      $session->email = $email;
      $session->authenticated = true;

      $response['message'] = "Logged in as " . $email;
      $response['email'] = $email;
      $response['valid'] = true;
      return $response;
  	}else {
      $response['message'] = 'Wrong username/password combination';
      $response['valid'] = false;
      return $response;
  	}
    $conn->close();
  }
