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

      $sql = 'SELECT e.event_id, name, address, schedule, COUNT(artist_id) AS acount '
             . 'FROM dbprj_events e LEFT JOIN dbprj_performs p ON e.event_id = p.event_id '
             . 'GROUP BY e.event_id ORDER BY name, e.event_id ASC';

      $result = $pdo->query($sql);
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
      echo '<th>Performers</th>';
      echo '</tr>';
      foreach ($result as $row) {
          echo '<tr>';
          echo '<td><a href="view_event.php?eid='
                . $row['event_id'] . '">' . htmlspecialchars($row['name']) . '</a></td>';
          echo '<td>' . htmlspecialchars($row['address']) . '</td>';
          echo '<td>' . htmlspecialchars($row['schedule']) . '</td>';
          echo '<td>' . htmlspecialchars($row['acount']) . '</td>';
          echo '</tr>';
      }
      echo '</table>';

    ?>
  </body>
</html>
