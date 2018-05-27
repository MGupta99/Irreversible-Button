<?php
  // Retrieves value of count from client
  $count = intval($_POST['value']);

  // Database set up
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
