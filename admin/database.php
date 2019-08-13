<?php
$servername = "shareddb-l.hosting.stackcp.net";
$username = "burgercodedb-39390d8f";
$password = "caracas30!";
$dbname = "burgercodedb-39390d8f";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
