<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Check Section</title>
  </head>
  <body>
      <?php
      session_start();
      echo '<pre>';
      print_r($_SESSION);
      echo '</pre>';
       ?>
  </body>
</html>