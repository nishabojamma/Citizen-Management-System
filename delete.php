<?php
$servername = "localhost";
$username = "root";
$password = "081721998@max";
$dbname = "citizen";
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);

$name = "";

try {
  $connection = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $ex) {
  echo "error";
  }
function getPosts(){
 $posts=array();
 $posts[0]=$_POST['number'];
 return $posts;
}
if(isset($_POST['delete'])){

  $data=getPosts();
  if(empty($_POST['number'])){
    echo "<script type='text/javascript'>alert('Empty');</script>";
  }else{
  $sql = "DELETE from citizen_information where adhar_no =$data[0]";
try {
  $delete_result=mysqli_query($connection,$sql);
  if($delete_result){
    if(mysqli_affected_rows($connection)>0){
      echo "<script type='text/javascript'>alert('Data Deleted');</script>";
    }else{
      echo "<script type='text/javascript'>alert('Data not found');</script>";
    }
  }
} catch (Exception $ex) {
  echo "error delete" .$ex->getMessage();
}
}
}
?>
