<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Artists</title>
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

      $sql = 'SELECT DISTINCT dbprj_artists.artist_id, dbprj_artists.name, '
	     . 'dbprj_artists.gender '
	     . 'FROM dbprj_artists JOIN dbprj_performs ON '
	     . 'dbprj_artists.artist_id = dbprj_performs.artist_id '
	     . 'JOIN dbprj_events ON dbprj_performs.event_id = dbprj_events.event_id '
	     . 'WHERE dbprj_events.address = "703 Mallory St" '
             . 'ORDER BY dbprj_artists.name, dbprj_artists.artist_id';
     
      $result = $pdo->query($sql);
      if (!$result) {
        if($pdo->errorCode() != '00000') {
          print_r($pdo->errorInfo());
        }
      }
      echo '<table>';
      echo '<tr>';
      echo '<th>Artist name</th>';
      echo '<th>Gender</th>';
      echo '</tr>';
      foreach ($result as $row) {
          echo '<tr>';
          $name = htmlspecialchars($row['name']);
          $aid =  htmlspecialchars($row['artist_id']);
          echo '<td>';
          echo '<a href="artist_events.php?aid=' . $aid . '">' . $name . '</a>';
          echo '</td>';

          echo '<td>' . htmlspecialchars($row['gender']) . '</td>';
          echo '</tr>';
      }
      echo '</table>';

    ?>
  </body>
</html>
