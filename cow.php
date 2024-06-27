<?php
// Connect To DB in PHPMYADMIN. Insert your own information down below// 
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$dbc = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$dbc) {
  die("Connection failed: " . mysqli_connect_error());
}else
{echo "database connection successful <br>";}
?>

