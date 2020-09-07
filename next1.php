<?php
$servername = "localhost";
$username = "root";
$password = "081721998@max";
$dbname = "citizen";

// Create connection
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);

try {
    $connection = new mysqli($servername, $username, $password, $dbname);
  } catch (Exception $ex) {
    echo "error";
    }
 function getPosts(){
   $posts=array();
   $posts[0]=$_POST['number'];
   $posts[1]=$_POST['name'];
   $posts[2]=$_POST['gender'];
   $posts[3]=$_POST['house'];
   $posts[4]=$_POST['bod'];
   $posts[5]=$_POST['phone'];
   $posts[6]=$_POST['email'];
   $posts[7]=$_POST['job'];
   $posts[8]=$_POST['degree'];
   $posts[9]=$_POST['master'];
   $posts[10]=$_POST['voter'];
   return $posts;
 }

if(isset($_POST['submit']))
{
  $data=getPosts();
  if(empty($_POST['name'])||empty($_POST['gender'])||empty($_POST['house'])||empty($_POST['bod'])||empty($_POST['phone'])||empty($_POST['email'])||empty($_POST['number'])||empty($_POST['job'])||empty($_POST['degree'])||empty($_POST['master'])||empty($_POST['voter'])){
    echo "<script type='text/javascript'>alert('Empty');</script>";
  }else{
  $query="INSERT INTO citizen_information (name, gender,house_no,dob,ph_no,email,adhar_no,job,degree,master_degree,voter_id)
  VALUES ('$data[1]', '$data[2]','$data[3]','$data[4]','$data[5]', '$data[6]','$data[0]','$data[7]','$data[8]','$data[9]','$data[10]')";
  try {
    $query=mysqli_query($connection,$query);
    if($query){
      if(mysqli_affected_rows($connection)>0){
        echo "<script type='text/javascript'>alert('Data Inserted');</script>";
      }else{
        echo "<script type='text/javascript'>alert('Data not Inserted');</script>";
      }
    }
  } catch (Exception $ex) {
    echo "<script type='text/javascript'>alert('Data Exist');</script>";
  }
}
}
 ?>

<html>
  <head>
    <link rel="stylesheet" href="next1.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <form class="next1" action="next1.php" method="post">
    <h1 align="center" style="color:blue; font-size:40px;"> CITIZEN'S INFORMATION</h1>
    <div align="center" style="color:white; font-size:20px;">
      <div style="position:absolute;bottom:585px;right:5px;width:250px;text-align: right;font-size:30px; color:red;">
      <a href="logout.php">Logout</a>
    </div>
    <p>NAME  <input type="text" name="name" placeholder="Name" required>
    GENDER <select style="padding: 5px 15px;" name="gender" required>
      <option value="male">MALE</option>
      <option value="female">FEMALE</option>
      <option value="others">OTHERS</option>
    </select>
    HOUSE NUMBER<input type="text" name="house" placeholder="HOUSE NUMBER" required></p>
  </div>
  <div align="center" style="color:white; font-size:20px;">
    <p>DATE OF BIRTH <input type="date" name="bod" placeholder="DOF" required>
    PHONE NUMBER <input type="phone number" name="phone" placeholder="PN" required pattern="[0-9]{10}">
    EMAIL  <input type="email" name="email" placeholder="Email" required></p>
  </div>
  <div align="center" style="color:white; font-size:20px;">
  <p>ADHAR NUMBER <input type="text" name="number" placeholder="Adhar number" required pattern="[0-9]{13}">
    JOB <input type="text" name="job" placeholder="Job" required></p>
  </div>
  <div align="center" style="color:white; font-size:20px;">
  <p style="color:white; font-size:20px;">DEGREE <input type="text" name="degree" placeholder="Degree" required>
    MASTER DEGREE <input type="text" name="master" placeholder="Master Degree" required></p>
    <p style="color:white; font-size:20px;">If there is no degree please enter the "NO" in the textbox</p>
    VOTER ID <input type="text" name="voter" placeholder="Voter ID" required>
    <p style="color:white; font-size:20px;">If there is no voter id please put "NO" in the textbox.</p>
    <button type="submit" name="submit" style="color:black;font-size:20px;">Submit</button>
  </div>
</form>
  </body>
</html>
