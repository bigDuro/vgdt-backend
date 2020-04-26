<?php
  function table_exists(&$db, $table) {
    $result = $db->query(checkIfTableExistQuery($table));
    if( $result->num_rows == 1 ) {
      return TRUE;
    } else {
      return FALSE;
    }
    $result->free();
  }
