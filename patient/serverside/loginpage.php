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
$sql="select p_id from login_p where p_username='$logingid' and p_pass='$password'";
$result =mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['loginid']=$row["p_id"];
      }
      echo $_SESSION['loginid'];
      mysqli_close($con);
     header("Location: /workplace/patient/home.html");
    die();
}
else
{
    mysqli_close($con);
    header("Location: /workplace/patient/index.html");
}

?>

