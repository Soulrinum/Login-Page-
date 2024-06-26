<?php
$servername = "localhost";
$username = "bob";
$password = "down";
$dbname = "onlineshop";

// Create connection
$dbc = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$dbc) {
  die("Connection failed: " . mysqli_connect_error());
}else
{echo "database connection successful <br>";}
?>

