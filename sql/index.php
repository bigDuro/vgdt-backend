<?php

function createTableQuery($table, $block) {
  $createStmn = $table;
  $createTableStatement = '(id int NOT NULL AUTO_INCREMENT,';
  // $blockCount = count($block);
  // $i = 0;
  foreach($block as $dataKey => $dataValues) {
      $getDataType = gettype($dataValues);

      if($getDataType == 'integer') {
        $createTableStatement .= '`'.$dataKey.'` int(11) DEFAULT NULL';
      } elseif($getDataType == 'double') {
        $createTableStatement .= '`'.$dataKey.'` float DEFAULT NULL';
      } elseif($getDataType == 'boolean') {
        $createTableStatement .= '`'.$dataKey.'` tinyint(2) DEFAULT NULL';
      } else {
        $createTableStatement .= '`'.$dataKey.'` varchar(255) DEFAULT NULL';
      }
      // $i++;
      //
      // if($blockCount > $i) {
        $createTableStatement .= ', ';
      // }


    };

    $createTableStatement .= 'PRIMARY KEY (`id`)';
    $createTableStatement .= ')';

    // $createTableStatement .= "COLLATE='latin1_swedish_ci' ENGINE=InnoDB";
    // echo "CREATE TABLE " . $table . $createTableStatement;
    return "CREATE TABLE " . $table . $createTableStatement;
}
