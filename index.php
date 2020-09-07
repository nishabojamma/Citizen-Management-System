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
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
    <div class="login">
      <div class="form">
    <form class="login-form" action="index.php" method="post">
      <h1 align="center" >Login Page</<h1>
      <div>
      <input type="email" name="email" placeholder="Email" required/>
      </div>
      <div>
      <input type="password" name="password" placeholder="Password" required/>
      </div>
      <button type="submit" name="submit">Login</button>
      <p class="message" style="color:black">Not register?<a href="sign.php">Register</a></p>
    </form>
  </body>
</html>
