<?php

# BikeShed version 0.0.0.1
# File version 0.0.0.1

# BikeShed
# https://github.com/Trekkie101/bikeshed

# tododone.php
# TodoDone - Marks off a done activity.

include 'config.php';

    mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
    mysql_select_db($dbname) or die(mysql_error());

      $todoDone = $_GET['compnum'];
        $todoDone2 = (int)$todoDone;


      mysql_query("UPDATE bs_todo SET todocomplete='1' WHERE todoid='$todoDone2'") or die(mysql_error());

    mysql_close();

    header("Location: index.php");
      die();

?>
