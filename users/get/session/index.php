<?php
  // require $_SERVER['DOCUMENT_ROOT'] . "/helpers/jsonResponse.php";
  require $_SERVER['DOCUMENT_ROOT'] . "/helpers/session.php";

  $data = Session::getInstance();
  // Let's display datas
  echo 'data: ' . $data->email , $data->authenticated;
