<?php


# BikeShed version 0.0.0.2
# File version 0.0.0.2

# BikeShed
# https://github.com/Trekkie101/bikeshed

# loggedin.php
# Carry out main authentication and login the user


include 'config.php';

mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

if(!empty($_POST['Username'])) {
  $username = $_POST['Username'];
  $password = $_POST['Password'];

  $username = htmlentities($username);
  $username = mysql_real_escape_string($username);

  $password = htmlentities($password);
  $password = mysql_real_escape_string($password);


  $result = mysql_query("SELECT id FROM bs_users WHERE username='$username' AND  password='$password'") or die(mysql_error());
  $row = mysql_fetch_array($result);
  $id = (int)$row['id'];
  if($id > 0) {
      session_start();
      $_SESSION['userId'] = $id;
      $_SESSION['username'] = $username;

          header("Location: index.php");
        } else{header("Location: login.php?incorrect=9");
}
} else{
header("Location: login.php?incorrect=9");
}

mysql_close();

?>
