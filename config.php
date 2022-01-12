<?php

//session_start();
$con=mysqli_connect("localhost","root","","car");
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>