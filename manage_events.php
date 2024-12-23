<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Manage event</title>
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

      $sql = 'SELECT e.event_id, e.name, address, schedule, GROUP_CONCAT(a.name) AS names '
	      . 'FROM dbprj_events e LEFT JOIN dbprj_performs p ON e.event_id = p.event_id '
	      . 'LEFT JOIN dbprj_artists a ON p.artist_id = a.artist_id '
             . 'GROUP BY e.event_id ORDER BY schedule DESC, e.event_id ASC';

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
      echo '<th>Add artist</th>';
      echo '</tr>';
      foreach ($result as $row) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($row['name']) . '</td>';
          echo '<td>' . htmlspecialchars($row['address']) . '</td>';
          echo '<td>' . htmlspecialchars($row['schedule']) . '</td>';
          echo '<td>' . htmlspecialchars($row['names']) . '</td>';
          echo '<td>';
          echo '<form action="add_artist.php" method="get">';
          echo '<input type="hidden" name="eid" '
               . 'value="' . htmlspecialchars($row['event_id']) . '">';
          echo '<input type="submit" value="Add artist">';
          echo '</form>';
          echo '</td>';

          echo '</tr>';
      }
      echo '</table>';

    ?>
  </body>
</html>
