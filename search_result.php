<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Event search results</title>
    <style>
      th, td { border: 1px solid black; }
    </style>
  </head>
  <body>
    <?php
      include 'config.php';
    ?>
    <?php
      $pdo = new PDO("mysql:dbname=${config['dbname']};host=${config['host']};charset=utf8", 
                      $config['name'], $config['pass']);
      $keywordLike = '%'.$_POST['keyword'].'%';
      $sql = 'SELECT name, address, schedule '
             . 'FROM dbprj_events WHERE name LIKE :kw OR address LIKE :kw2 '
             . 'ORDER BY name, event_id ASC';

      $stmt = $pdo->prepare($sql);
      $stmt->execute([ ':kw' => $keywordLike, ':kw2' => $keywordLike ]);
      $result = $stmt->fetchAll();
      if (!$result) {
        if($stmt->errorCode() != '00000') {
          print_r($stmt->errorInfo());
        }
      }
      echo '<table>';
      echo '<tr>';
      echo '<th>Event name</th>';
      echo '<th>Address</th>';
      echo '<th>Schedule</th>';
      echo '</tr>';
      foreach ($result as $row) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($row['name']) . '</td>';
          echo '<td>' . htmlspecialchars($row['address']) . '</td>';
          echo '<td>' . htmlspecialchars($row['schedule']) . '</td>';
          echo '</tr>';
      }
      echo '</table>';

    ?>
  </body>
</html>