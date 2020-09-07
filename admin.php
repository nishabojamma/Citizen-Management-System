<?php
$error='';
if(isset($_POST['submit']))
{
  if(empty($_POST['username'])||empty($_POST['password'])){
    echo "Username or Password is empty";
  }
  else{
    $password=$_POST["password"];
    $username=$_POST["username"];
    $conn = new mysqli("localhost", "root", "081721998@max");
    $db=mysqli_select_db($conn,"citizen");
    $query=mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
    $rows=mysqli_num_rows($query);

    if($rows==1){
      echo "<script> location.href='admin1.php'; </script>";
    }
    else{
      echo "username or password is invalied";
    }
    mysqli_close($conn);
  }
}

?>
