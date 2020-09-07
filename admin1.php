<?php
$servername = "localhost";
$username = "root";
$password = "081721998@max";
$dbname = "citizen";
  mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$number="";
$name = "";
$gender = "";
$house = "";
$bod = "";
$phone = "";
$email = "";
$job = "";
$degree = "";
$master = "";
$voter = "";

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

if(isset($_POST['search']))
{

  $data=getPosts();

  $query="SELECT * from citizen_information where adhar_no = $data[0]";
  $result=mysqli_query($connection,$query);
  if($result)
  {
  if(mysqli_num_rows($result))
  {
  while($row=mysqli_fetch_array($result))
  {
    $number=$row['adhar_no'];
    $name=  $row['name'];
    $gender= $row['gender'];
    $house=  $row['house_no'];
    $bod= $row['dob'];
    $phone= $row['ph_no'];
    $email= $row['email'];
    $job=  $row['job'];
    $degree=  $row['degree'];
    $master=  $row['master_degree'];
    $voter= $row['voter_id'];
  }
}else{
  echo "<script type='text/javascript'>alert('No Data');</script>";
}
}else {
  echo "<script type='text/javascript'>alert('Result Error');</script>";
}
}
if(isset($_POST['update'])){
  $name=$_POST["name"];
  $gender=$_POST["gender"];
  $house=$_POST["house"];
  $bod=$_POST["bod"];
  $phone=$_POST["phone"];
  $email=$_POST["email"];
  $number=$_POST["number"];
  $job=$_POST["job"];
  $degree=$_POST["degree"];
  $master=$_POST["master"];
  $voter=$_POST["voter"];
  if(empty($_POST['name'])||empty($_POST['gender'])||empty($_POST['house'])||empty($_POST['bod'])||empty($_POST['phone'])||empty($_POST['email'])||empty($_POST['number'])||empty($_POST['job'])||empty($_POST['degree'])||empty($_POST['master'])||empty($_POST['voter'])){
    echo "<script type='text/javascript'>alert('Empty');</script>";
  }else{
  $update_query = "UPDATE citizen_information SET name='".$name."',gender='".$gender."',house_no='".$house."',dob='".$bod."',ph_no='".$phone."',email='".$email."',job='".$job."',degree='".$degree."',master_degree='".$master."',voter_id='".$voter."' WHERE adhar_no='".$number."'";

  $update_result=mysqli_query($connection,$update_query);
  if($update_result){
    echo "<script type='text/javascript'>alert('Data is updated');</script>";
  }else{
    echo "<script type='text/javascript'>alert('Data is not updated');</script>";
  }
}
  mysqli_close($connection);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <<link rel="stylesheet" href="admin1.css">
    <meta charset="utf-8">
    <title>Admin Page</title>
  </head>
  <body>
    <form action="admin1.php" method="POST">
      <h1 align="center" style="color:blue; font-size:40px;"> CITIZEN'S INFORMATION</h1>
      <div align="center" style="color:white; font-size:20px;">
      ADHAR NUMBER <input type="number" name="number" placeholder="Adhar number" value="<?php echo $number;?>"><button type="search" name="search" style="color:black;font-size:20px;">SEARCH</button>
      <button type="update" name="update" style="color:black;font-size:20px;">UPDATE</button>
      </div>
      <div style="position:absolute;bottom:585px;right:5px;width:250px;text-align: right;font-size:30px; color:red;">
      <a href="logout.php">Logout</a>
    </div>
      <div align="center" style="color:white; font-size:20px;">
      <p>NAME  <input type="text" name="name" placeholder="Name" value="<?php echo $name;?>">
      GENDER <input type="gender" name="gender" placeholder="Gender" style="padding: 5px 15px;" value="<?php echo $gender;?>">
      HOUSE NUMBER<input type="text" name="house" placeholder="HOUSE NUMBER" value="<?php echo $house;?>"/></p>
    </div>
    <div align="center" style="color:white; font-size:20px;">
      <p>DATE OF BIRTH <input type="text" name="bod" placeholder="BOD" value="<?php echo $bod;?>">
      PHONE NUMBER <input type="phone number" name="phone" placeholder="PN" value="<?php echo $phone;?>"/>
      EMAIL  <input type="email" name="email" placeholder="Email" value="<?php echo $email;?>"></p>
    </div>
    <div align="center" style="color:white; font-size:20px;">
    <p>JOB <input type="text" name="job" placeholder="Job" value="<?php echo $job;?>"></p>
    </div>
    <div align="center" style="color:white; font-size:20px;">
    <p style="color:white; font-size:20px;">DEGREE <input type="text" name="degree" placeholder="Degree" value="<?php echo $degree;?>">
      MASTER DEGREE <input type="text" name="master" placeholder="Degree" value="<?php echo $master;?>">
      VOTER ID <input type="text" name="voter" placeholder="Voter ID" value="<?php echo $voter;?>"></p>
    </div>
  </body>
</html>
