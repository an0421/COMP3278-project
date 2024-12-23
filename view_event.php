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
      
      $sql = 'SELECT name, address, schedule '
             . 'FROM dbprj_events WHERE event_id = :eid';
      $stmt = $pdo->prepare($sql);
      $stmt->execute([ ':eid' => $_GET['eid'] ]);
      $result = $stmt->fetch();
      if (!$result) {
        if($stmt->errorCode() != '00000') {
          print_r($stmt->errorInfo());
        }
      }
      echo 'Name: ' . $result['name'] . '<br>';
      echo 'Address: ' . $result['address'] . '<br>';
      echo 'Schedule: ' . $result['schedule'] . '<br>';

      $sql = 'SELECT director, GROUP_CONCAT(genre) AS genres '
             . 'FROM dbprj_dramas t LEFT JOIN dbprj_genres eq ON t.event_id = eq.event_id '
             . 'WHERE t.event_id = :eid GROUP BY t.event_id';
             
      $stmt = $pdo->prepare($sql);
      $stmt->execute([ ':eid' => $_GET['eid'] ]);
      $result = $stmt->fetch();
      if (!$result) {
        if($stmt->errorCode() != '00000') {
          print_r($stmt->errorInfo());
        }
      } else {
        echo 'Director: ' . $result['director'] . '<br>';
        echo 'Genres: ' . $result['genres'] . '<br>';
      }

      $sql = 'SELECT conductor, GROUP_CONCAT(instrument) AS instruments '
             . 'FROM dbprj_concerts c LEFT JOIN dbprj_instruments i ON c.event_id = i.event_id '
             . 'WHERE c.event_id = :eid GROUP BY c.event_id';
             
      $stmt = $pdo->prepare($sql);
      $stmt->execute([ ':eid' => $_GET['eid'] ]);
      $result = $stmt->fetch();
      if (!$result) {
        if($stmt->errorCode() != '00000') {
          print_r($stmt->errorInfo());
        }
      } else {
        echo 'Conductor: ' . $result['conductor'] . '<br>';
        echo 'Instruments: ' . $result['instruments'] . '<br>';
      }

      $sql = 'SELECT name, gender '
             . 'FROM dbprj_artists a LEFT JOIN dbprj_performs p ON a.artist_id = p.artist_id '
             . 'WHERE p.event_id = :eid ORDER BY name, a.artist_id';
             
      $stmt = $pdo->prepare($sql);
      $stmt->execute([ ':eid' => $_GET['eid'] ]);
      $result = $stmt->fetchAll();
      if (!$result) {
        if($stmt->errorCode() != '00000') {
          print_r($stmt->errorInfo());
        }
      } else {
        
        echo '<table>';
        echo '<tr>';
        echo '<th>Artist name</th>';
        echo '<th>Gender</th>';
        echo '</tr>';
        foreach ($result as $row) {
          echo '<tr>';
          echo '<td>'. htmlspecialchars($row['name']) . '</td>';
          echo '<td>' . htmlspecialchars($row['gender']) . '</td>';
          echo '</tr>';
        }
        echo '</table>';
      }

      $sql = 'SELECT part_id, pic '
             . 'FROM dbprj_concerts_parts '
             . 'WHERE event_id = :eid ORDER BY part_id';
             
      $stmt = $pdo->prepare($sql);
      $stmt->execute([ ':eid' => $_GET['eid'] ]);
      $result = $stmt->fetchAll();
      if (!$result) {
        if($stmt->errorCode() != '00000') {
          print_r($stmt->errorInfo());
        }
      } else {
        
        echo '<table>';
        echo '<tr>';
        echo '<th>Part ID</th>';
        echo '<th>Person in charge</th>';
        echo '</tr>';
        foreach ($result as $row) {
          echo '<tr>';
          echo '<td>'. htmlspecialchars($row['part_id']) . '</td>';
          echo '<td>' . htmlspecialchars($row['pic']) . '</td>';
          echo '</tr>';
        }
        echo '</table>';
      }
    ?>
  </body>
</html>
