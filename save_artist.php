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

      $sql = 'INSERT INTO dbprj_performs (artist_id, event_id) VALUES ( :aid, :eid )';

      $stmt = $pdo->prepare($sql);
      $stmt->execute([ ':aid' => $_POST['aid'], 
                       ':eid' => $_POST['eid'] ]);
      $result = $stmt->fetchAll();
      if (!$result) {
        if($stmt->errorCode() != '00000') {
          print_r($stmt->errorInfo());
        } else {
          echo 'Artist added';
        }
      }
    ?>
  </body>
</html>
