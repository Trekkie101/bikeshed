<?php

# BikeShed version 0.0.0.1
# File version 0.0.0.1

# BikeShed
# https://github.com/Trekkie101/bikeshed

# todoaddquick.php
# Todo Add Quick - Take data from dashboard and add to todo list for current user, with 7 day deadline

include 'config.php';

    mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
    mysql_select_db($dbname) or die(mysql_error());

      $todoAdd1 = $_POST['todoquick'];
      $todoAdd2 = htmlentities($todoAdd1);
      $todoAdd3 = mysql_real_escape_string($todoAdd2);

      $futuredate = strtotime("+7 day");
      $storedate = date('Y-m-d', $futuredate);

          mysql_query("INSERT INTO bs_todo (todoid,todoassigned,tododue,todotask,todocomplete,todoprojid) VALUES('','1','$storedate','$todoAdd3','0','1')") or die(mysql_error());

    mysql_close();

header("Location: index.php");


?>
