<?php

# BikeShed version 0.0.0.1
# File version 0.0.0.5

# BikeShed
# https://github.com/Trekkie101/bikeshed

# index.php
# Main Dashboard - provides overview of whole project

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
            <li class="active"><a href="index.php">Dashboard</a></li>
            <li><a href="calendar.php">Calendar</a></li>
            <li><a href="todo.php">Todo</a></li>
            <li><a href="files.php">Files</a></li>
            <li><a href="messages.php">Messages</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <br /><br /><br />

    <div class="container">

    <h1>Hello $user,</h1><br />

      <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Calendar - <i>All users</i></h3>
            </div>
            <div class="panel-body">


                <table class="table table-condensed">
                  <tr class="info"><td><b>Monday</b></td></tr>
                  <tr><td class="danger">Task 1 - <i>Overdue</i></td></tr>
                  <tr class="info"><td><b>Tuesday</b></td></tr>
                  <tr><td>Task 2</td></tr>
                  <tr><td>Read a book</td></tr>
                  <tr class="info"><td><b>Wednesday<b/></td></tr>
                  <tr><td>Empty trash</td></tr>
                  <tr><td>Make tea</td></tr>
                  <tr><td>Go for a run</td></tr>

                </table>




            </div>
          </div>
        </div>

            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Todo - <i>Assigned to me</i></h3>
              </div>
              <div class="panel-body">
                  <ul class="list-group">';


              $todo1 = mysql_query("SELECT * FROM bs_todo WHERE todoassigned = '1' AND todoprojid ='1'") or die(mysql_error());

              while($row1 = mysql_fetch_array($todo1)) {
                echo'
                  <li class="list-group-item">
                    <span class="badge">Done</span>';
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

                  <form action="todoaddquick.php" method="post">
                    <div class="input-group">
                      <input type="text" class="form-control" name="todoquick" placeholder="Quick new item...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">Add!</button>
                        </span>
                    </div>
                </form>

              </div>
            </div>
          </div>

      </div>

      <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Files</h3>
            </div>
            <div class="panel-body">
             Coming soon
            </div>
          </div>
        </div>

            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Messages</h3>
              </div>
              <div class="panel-body">

              <table class="table table-condensed">
                <tr><td><b>Trekkie101</b></td><td>Hi folks, how are you?</td></tr>
                <tr><td><b>Sami</b></td><td>Hi</td></tr>
                <tr><td><b>Sami</b></td><td>It\'s going well</td></tr>
                <tr><td><b>Trekkie101</b></td><td>This is an extra long message to test what the box does when the content is too long</td></tr>
                <tr><td><b>Trekkie101</b></td><td>It worked!</td></tr>
              </table>

              <div class="input-group">
                <input type="text" class="form-control" placeholder="Say something">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Send</button>
                  </span>
              </div>


              </div>
            </div>
          </div>
    </div>

    <ol class="breadcrumb">
      <li>You are currently looking at: <b>Project Poseiden</b></li>
      <li><a href="changeproject.php">Change Project</a></li>
      <li><a href="tools.php">Settings</a></li>

    </ol>

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

mysql_close();

?>
