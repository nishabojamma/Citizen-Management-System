<?php
$servername = "localhost";
$username = "root";
$password = "081721998@max";
$dbname = "citizen";
$name=$_POST["name"];
$password=$_POST["password"];
$email=$_POST["email"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(empty($_POST['email'])||empty($_POST['password'])||empty($_POST['name'])){
  echo "Username or Password is empty";
}else{
$sql = "INSERT INTO sign_in (name, password, email)
VALUES ('$name', '$password', '$email')";

if ($conn->query($sql) === TRUE) {
      echo "<script type='text/javascript'>alert('Successfull');</script>";
      
} else {
    echo "<script type='text/javascript'>alert('Data exists');</script>";
}
}
$conn->close();
?>
