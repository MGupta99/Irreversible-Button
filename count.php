<!DOCTYPE html>

<html>
  <body>
    <?php
      $count = intval($_REQUEST["q"]);
      $db = new SQLite3('count.db');
      if ($count == 0) {
        //$db->exec('CREATE TABLE IF NOT EXISTS count (zero INTEGER PRIMARY KEY, tally INTEGER)');
        $db->exec('CREATE TABLE IF NOT EXISTS count (tally INTEGER PRIMARY KEY)');
        //$db->exec('INSERT OR REPLACE INTO count (zero) VALUES (0)');
        if (is_null(($db->querySingle('SELECT tally FROM count')))){
          $db->exec('INSERT OR REPLACE INTO count (tally) VALUES (0)');
        }
        $result = $db->query('SELECT tally FROM count');
        echo strip_tags(($result->fetchArray(SQLITE3_NUM))[0]);
      } else {
          $db->exec("UPDATE count SET tally = '$count'");
      }
     ?>
  </body>
</html>
