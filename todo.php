<?php

# BikeShed version 0.0.0.1
# File version 0.0.0.3

# BikeShed
# https://github.com/Trekkie101/bikeshed

# todo.php
# Will display assigned and all users tasks



include 'config.php';

mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());


echo'
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BikeShed::Home</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">BikeShed</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="calendar.php">Calendar</a></li>
            <li class="active"><a href="todo.php">Todo</a></li>
            <li><a href="files.php">Files</a></li>
            <li><a href="messages.php">Messages</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <br /><br /><br />

    <div class="container">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Todo - <i>Assigned to me</i></h3>
      </div>
      <div class="panel-body">
          <ul class="list-group">';


      $todo1 = mysql_query("SELECT * FROM bs_todo WHERE todoassigned = '1' AND todoprojid ='1' AND todocomplete = '0' ORDER BY tododue ASC") or die(mysql_error());

      while($row1 = mysql_fetch_array($todo1)) {

        $todocompnum = $row1['todoid'];
        $todocomplink = '<a class="badge" href="tododone.php?compnum='.$todocompnum.'">Done</a>';

        echo'
          <li class="list-group-item">
            <span class="badge">'.$todocomplink.'</span>';
              echo $row1['todotask']; echo' <small>-';
              echo $row1['tododue'];
        echo'</small></li>';
      }

      $todo2 = mysql_query("SELECT todocomplete, COUNT(*) FROM bs_todo WHERE todocomplete = '0' AND todoassigned = '1' AND todoprojid = '1'") or die(mysql_error());

      while($row2 = mysql_fetch_array($todo2)) {
              $todoNotDone = $row2['COUNT(*)'];
      }

      $todo3 = mysql_query("SELECT todocomplete, COUNT(*) FROM bs_todo WHERE todocomplete = '1' AND todoassigned = '1' AND todoprojid ='1'") or die(mysql_error());

      while($row3 = mysql_fetch_array($todo3)) {
              $todoDone = $row3['COUNT(*)'];
      }

      $todoTotal = ($todoDone + $todoNotDone);
      $todoPercent = round((($todoDone / $todoTotal)*100)) ;

      echo'
      </ul>
          <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="'.$todoPercent.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$todoPercent.'%;">
              '.$todoPercent.'%
            </div>
          </div>

<!-- ADD TODO HERE -->

      </div>
    </div>




    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Todo - <i>Complete by me</i></h3>
    </div>
    <div class="panel-body">
        <ul class="list-group">';


    $todo4 = mysql_query("SELECT * FROM bs_todo WHERE todoassigned = '1' AND todoprojid ='1' AND todocomplete = '1' ORDER BY tododue ASC") or die(mysql_error());

    while($row4 = mysql_fetch_array($todo4)) {
      echo'
        <li class="list-group-item">';
            echo $row4['todotask']; echo' <small>-';
            echo $row4['tododue'];
      echo'</small></li>';
    }
echo'
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Todo - <i>Complete by all (limit 50)</i></h3>
  </div>
  <div class="panel-body">
      <ul class="list-group">';


  $todo5 = mysql_query("SELECT * FROM bs_todo WHERE todoprojid ='1' AND todocomplete = '1' ORDER BY tododue ASC LIMIT 0,50") or die(mysql_error());

  while($row5 = mysql_fetch_array($todo5)) {
    echo'
      <li class="list-group-item">';
          echo $row5['todotask']; echo' <small>-';
          echo $row5['tododue'];
    echo'</small></li>';
  }
echo'
  </div>
</div>




    </div>






    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>

';
 ?>
