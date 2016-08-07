<?php

# BikeShed version 0.0.0.1
# File version 0.0.0.1

# BikeShed
# https://github.com/Trekkie101/bikeshed

# login.php
# Log a user in and present the front page

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
            <li class="active"><a href="login.php">Welcome</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <br /><br /><br />

    <div class="container">
    <div class="row">
    <div class="col-md-6">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Welcome to BikeShed!</h3>
      </div>
      <div class="panel-body">

      The web-based project management tool. PHP and MySQL/MariaDB based solution. Uses bootstrap.<br /><br />

      <b>Why is it called "BikeShed"</b>?<br /><br />

      Based on Parkinsons Law of Triviality, suggests the smaller a problem is, the more likely it is to be discussed. There should be a project tool to enable this.<br /><br />

      To this end, presenting BikeShed.<br /><br />

      <a href="https://en.wikipedia.org/wiki/Law_of_triviality">Parkinsons Law of Triviality</a>
      </div>
    </div>
    </div>
      <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Login</h3>
        </div>
      <div class="panel-body">
    <form action="loggedin.php" method="post">
      <div class="form-group">
        <label for="Username">Username</label>
        <input type="text" class="form-control" name="Username" id="Username" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-default">Login</button>
    </form> <br /><br />';


if(!empty($_GET['incorrect'])) {

    if($_GET['incorrect'] == '9'){

echo'<div class="alert alert-danger" role="alert">Incorrect login details, please try again</div>';

}}

echo'
</div>


</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Register</h3>
  </div>
  <div class="panel-body">
    Want to use BikeShed Project Management for your team?<br /><br />

    <a href="#" class="btn btn-success" role="button">Create a project</a>

  </div>
</div>
</div>
</div>
<ol class="breadcrumb">
  <li>This is <b>Alpha</b> software</li>
  <li>&copy 2016 The BikeShed Team</li>
  <li><a href="https://github.com/Trekkie101/bikeshed">Github</a></li>
</ol>

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
