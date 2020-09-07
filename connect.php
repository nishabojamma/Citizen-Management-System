<?php
$error='';
if(isset($_POST['submit']))
{
  if(empty($_POST['email'])||empty($_POST['password'])){
    alert("Username or Password is empty");
  }
  else{
    $password=$_POST["password"];
    $email=$_POST["email"];
    $conn = new mysqli("localhost", "root", "081721998@max");
    $db=mysqli_select_db($conn,"citizen");
    $query=mysqli_query($conn, "SELECT * FROM sign_in WHERE email = '$email' AND password = '$password'");
    $querys=mysqli_query($conn, "SELECT * FROM admin WHERE username = '$email' AND password = '$password'");
    $rows=mysqli_num_rows($query);
    $row=mysqli_num_rows($querys);
    if($rows==1){
      echo "<script> location.href='next1.php'; </script>";
    }elseif($row==1){
      echo "<script> location.href='adnex.html'; </script>";
    }else{
        echo "<script type='text/javascript'>alert('username or password is invalied');</script>";
    }
    mysqli_close($conn);
  }
}

?>
