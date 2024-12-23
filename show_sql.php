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

      $sql_1 = "select e.event_id,  e.name from dbprj_events e, dbprj_concerts c where e.event_id = c.event_id and e.schedule >= '2024-10-01 00:00:00' order by e.schedule limit 4";
      $sql_2 = "select  event_id, name from dbprj_events where event_id in (SELECT event_id from dbprj_performs where artist_id in (select artist_id from dbprj_performs p, dbprj_events e where p.event_id = e.event_id and YEAR(schedule)=2024 group by artist_id having count(p.event_id) >= 3))
";
      $sql_3 = "select event_id, name from dbprj_events where event_id not in (select event_id from dbprj_dramas) and event_id not in (select event_id from dbprj_concerts)";
      echo '<table>';
      echo '<tr>';
      echo '<th>Q_ID</th>';
      echo '<th>SQL</th>';
      echo '<th>Execute</th>';
      echo '</tr>';
      echo '<tr>';
      echo '<td>' . '1' . '</td>';
          echo '<td>' . $sql_1 . '</td>';
          echo '<td>';
          echo '<form action="execute_sql.php" method="post">';
          echo '<input type="hidden" name="sql" '
               . 'value="' . $sql_1 . '">';
          echo '<input type="submit" value="execute">';
          echo '</form>';
	  echo '</td>';
	  echo '</tr>';

	  echo '<tr>';
	  echo '<td>' . '2' . '</td>';
          echo '<td>' . $sql_2 . '</td>';
          echo '<td>';
          echo '<form action="execute_sql.php" method="post">';
          echo '<input type="hidden" name="sql" '
               . 'value="' . $sql_2 . '">';
          echo '<input type="submit" value="execute">';
          echo '</form>';
	  echo '</td>';
          echo '</tr>';

	  echo '<td>' . '3' . '</td>';
          echo '<td>' . $sql_3 . '</td>';
          echo '<td>';
          echo '<form action="execute_sql.php" method="post">';
          echo '<input type="hidden" name="sql" '
               . 'value="' . $sql_3 . '">';
          echo '<input type="submit" value="execute">';
          echo '</form>';
          echo '</td>';
          
     
      echo '</table>';
