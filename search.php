<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Search events</title>
    <style>
      th, td { border: 1px solid black; }
    </style>
  </head>
  <body>
    <?php
      include 'config.php';
    ?>
    <form action="search_result.php" method="post">
      <label for="events_keyword">Search event by keyword</label>
      <input type="search" name="keyword" id="events_keyword">
      <input type="submit" value="Search">
    </form>
  </body>
</html>
