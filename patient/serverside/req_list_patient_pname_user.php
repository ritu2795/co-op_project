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
$pname=$_POST["p_name"];
$sql="select p_username from login_p where p_username='$pname'";
$rows = array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $count = $count + 1;
      }

     
if($count==0){
    echo "Valid Username";
}
else if($count>=1){
    echo "Not Valid- Username Already Exist"; 
}


mysqli_close($con);

?>