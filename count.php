<?php
  $count = intval($_POST['value']);
  /*$db = new SQLite3('data.db');
  if ($count == 0) {
    $db->exec('CREATE TABLE IF NOT EXISTS count (tally INTEGER PRIMARY KEY)');
    if (is_null(($db->querySingle('SELECT tally FROM count')))){
      $db->exec('INSERT OR REPLACE INTO count (tally) VALUES (0)');
    }
    $result = $db->query('SELECT tally FROM count');
    echo strip_tags(($result->fetchArray(SQLITE3_NUM))[0]);
  } else {
      $db->exec("UPDATE count SET tally = '$count'");
      echo 'Databse Updated with Count = ' . $count;
  }*/

  $db_name = 'data.db';
  $db_drvr = 'sqlite';

  $pdo = new PDO("$db_drvr:$db_name");

  // Retrieves count from db if page has been refreshed
  if ($count == 0) {
    $result = $pdo->query('SELECT tally FROM count');
    $new_count = $result->fetch(PDO::FETCH_NUM);
    echo strip_tags($new_count[0]);

  // Updates database if button pressed 
  } else {
    $pdo->exec("UPDATE count SET tally = '$count'");
    echo 'Database Updated with Count = ' . $count;
  }

?>
