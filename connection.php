<?php


$username = "root";
  $password = "";
  $db = "dbms";
  $host = "localhost";
  $port = 3306;

  $con = mysqli_connect(
    "$host:$port",
    $username,
    $password
  );



mysqli_select_db($con, $db);

?>