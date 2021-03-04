<?php
$servername="localhost";
$username="root";
$pass_db="";
$dbname="socialwork";

session_start();
$con=new mysqli($servername,$username,$pass_db,$dbname);
if($con->connect_error){
    die("Connection Failed".$con->connect_error);
}

$count=0;
$pid=$_POST["p_id"];
$sql="select p_id from patient where p_id='$pid'";
$rows = array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $count = $count + 1;
      }

$count1=0;     
$sql="select p_id from login_p where p_id='$pid'";
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $count1 = $count1 + 1;
     }
     
if($count==0){
    echo "Not Valid";
}
else if($count==1 && $count1 == 0){
    echo "Valid ID"; 
}
else if($count==1 && $count1 == 1){
    echo "Account Already exist";
}

else{
    echo "Error identifying Patient ID";
}


mysqli_close($con);

?>