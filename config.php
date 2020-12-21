<?php
session_start();
$host = "localhost"; /* Host name */
$user = "id14927610_hunkeledigital"; /* User */
$password = "YAnkees51!!1234"; /* Password */
$dbname = "id14927610_customers"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}