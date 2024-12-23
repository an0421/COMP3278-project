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

      $sql = $_POST['sql'];

      $result = $pdo->query($sql);
       foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
      echo '(' . implode(', ', $row) . ')<br>';
  }  
    ?>
  </body>
</html>
