<?php
  function logoutUser($_session) {
    $session = $_session::getInstance();
    $session->destroySession();

    $response['message'] = 'Logged Out';
    $response['valid'] = true;

    return $response;
  }
