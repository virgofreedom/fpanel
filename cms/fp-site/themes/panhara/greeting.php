<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "012849594";
$dbname = "form";
// $dbhost = "localhost";
// $dbuser = "panhara";
// $dbpass = "849594";
// $dbname = "panhara";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die($conn->connect_error);

if(!empty($_POST['fullname'] || $_POST['email'] || $_POST['phone'] || $_POST['message'])){
  $fullname = $conn->real_escape_string($_POST['fullname']);
  $email = $conn->real_escape_string($_POST['email']);
  $phone = $conn->real_escape_string($_POST['phone']);
  $message = $conn->real_escape_string($_POST['message']);
  $query = "INSERT into fcon (fullname,email,phone,message)
  VALUES('" . $fullname . "','".$email."','".$phone."','".$message."')";
  $success = $conn->query($query);
  echo "Thank for contact me";
}else {
  echo "No";
}
$conn->close();
 ?>
