<?php
if(isset($_POST['search']))
{
  $adhar=$_POST['number'];
  $connect=mysqli_connect("localhost","root","081721998@max","citizen");
  $query="SELECT 'name','gender','house_no','dob','phone_no','email','job','degree','master_degree','voter_id' from citizen_information where 'adhar_no'=$adhar LIMIT 1";
  $result=mysqli_query($connect,$query);
  if(mysqli_num_rows($result)>0)
  {
  while($row=mysqli_fetch_array($result))
  {
    $name=$row['name'];
    $gender=$row['gender'];
    $house=$row['house_no'];
    $dob=$row['dob'];
    $phone=$row['phone_no'];
    $email=$row['email'];
    $job=$row['job'];
    $degree=$row['degree'];
    $master=$row['master_degree'];
    $voter=$row['voter_id'];
  }
}else{
  echo "undefined";
  $name = "";
  $gender = "";
  $house = "";
  $dob = "";
  $phone = "";
  $email = "";
  $job = "";
  $degree = "";
  $master = "";
  $voter = "";
}
  mysqli_free_result($result);
  mysqli_close($connect);
}


 ?>
