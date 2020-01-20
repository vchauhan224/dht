<?php
error_reporting(0);

if($_SERVER['HTTP_HOST']=="localhost") {
  $dns = "localhost";
  $user = "root";
  $pass = "";
  $db = "angular_data";
}
$connection = mysqli_connect("$dns","$user","$pass","$db") or die (mysqli_error());

?>
			




