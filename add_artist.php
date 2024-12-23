<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add artist to events</title>
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

      $sql = 'SELECT artist_id, name '
             . 'FROM dbprj_artists WHERE artist_id NOT IN ( '
               . 'SELECT artist_id FROM dbprj_performs WHERE event_id = :eid'
               . ' ) ORDER BY name, artist_id';
     
      $stmt = $pdo->prepare($sql);
      $stmt->execute([ ':eid' => $_GET['eid'] ]);
      $result = $stmt->fetchAll();
      if (!$result) {
        if($stmt->errorCode() != '00000') {
          print_r($stmt->errorInfo());
        }
      }
      
      echo '<form action="save_artist.php" method="post">';
      echo '<input type="hidden" name="eid" '
           . 'value="' . htmlspecialchars($_GET['eid']) . '">';
      echo '<label for="event_artist">Add artist:</label>';
      echo '<select name="aid" id="event_artist">';
      foreach($result as $row) {
        echo '<option value="' . htmlspecialchars($row['artist_id']) . '">'
              . htmlspecialchars($row['name'])
              . '</option>';
      }
      echo '</select><br>';           
      echo '<input type="submit" value="Save">';
      echo '</form>';
    ?>
  </body>
</html>
