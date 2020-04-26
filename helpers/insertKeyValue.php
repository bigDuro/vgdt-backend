<?php

function getInsertStatement($table, $data) {
  return "INSERT INTO `$table`(`" . getProps($data) . "`)" . " VALUES ('" . getValues($data) . "')";
}

function getProps($data) {
  return str_replace(",", "`,`", implode(",", array_keys($data)));
}
function getValues($data) {
  return str_replace(",", "','", implode(",", array_values($data)));
}
