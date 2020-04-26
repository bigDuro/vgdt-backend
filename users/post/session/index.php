<?php
  function isValidSession($_session) {
    $session = $_session::getInstance();
    $response['user'] = $session->email;
    $response['authenticated'] = $session->email != null;

    return $response;
  }
