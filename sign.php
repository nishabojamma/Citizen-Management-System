<?php
$servername = "localhost";
$username = "root";
$password = "081721998@max";
$dbname = "citizen";
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);

$name = "";
$email="";
$password="";
try {
  $connection = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $ex) {
  echo "error";
  }
function getPosts(){
 $posts=array();
 $posts[0]=$_POST['name'];
 $posts[1]=$_POST['email'];
 $posts[2]=$_POST['password'];
 return $posts;
}

if(isset($_POST['submit'])){

  $data=getPosts();
  if(empty($_POST['name'])|| empty($_POST['email'])||empty($_POST['password'])){
    echo "<script type='text/javascript'>alert('Empty');</script>";
  }else{
  $sql = "INSERT INTO sign_in (name, password, email) VALUES ('$data[0]', '$data[2]', '$data[1]')";;
try {
  $delete_result=mysqli_query($connection,$sql);
  if($delete_result){
    if(mysqli_affected_rows($connection)>0){
      echo "<script type='text/javascript'>alert('Data Inserted');</script>";
    }else{
      echo "<script type='text/javascript'>alert('Data Exists');</script>";
    }
  }
} catch (Exception $ex) {
  echo "error delete" .$ex->getMessage();
}
}
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="sign">
    <div class="form">
      <form class="register form" action="sign.php" method=post>
        <h1 align="center">Sign Up</<h1>
        <div>
        <input type="text" name="name" placeholder="Name" >
        </div>
        <div>
        <input type="password" name="password" placeholder="Password" >
        </div>
        <div>
        <input type="email" name="email" placeholder="Email" >
        </div>
        <button type="submit" name="submit">Create</button>
        <p class="message">Already Register? <a href="index.php">Login</a></p>
      </form>
    </div>
    </div>

  </body>
</html>
