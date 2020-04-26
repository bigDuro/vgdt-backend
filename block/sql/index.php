<?php
  require $_SERVER['DOCUMENT_ROOT'] . "/helpers/insertKeyValue.php";

  // sql queryies

  function getBlockServiceQuery($block, $table) {
    return "SELECT $block FROM $table";
  };

  function getCreateBlockServiceQuery($block, $table) {
    return "INSERT INTO $table (`" . (getProps($block)) . "`) VALUES ('" . (getValues($block)) . "')";
  };


  function checkIfTableExistQuery($table) {
    return "SHOW TABLES LIKE '{$table}'";
  };
