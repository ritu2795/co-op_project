<?php
session_start();
$servername="localhost";
$username="root";
$pass_db="";
$dbname="socialwork";

$logingid=$_POST["loginid"];
$password=$_POST["pass"];

$con=new mysqli($servername,$username,$pass_db,$dbname);
if($con->connect_error){
    die("Connection Failed".$con->connect_error);
    echo "servername";
}

$sql="select s_id from login_s where s_username='$logingid' and s_pass='$password'";
$result =mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['loginid']=$row["s_id"];
      }
      mysqli_close($con);
    header("Location: /workplace/staff/home.html");
    die();
} 

else
{
    mysqli_close($con);
    header("Location: /workplace/patient/index.html");
    
}
?>

