<?php
session_start();
$servername="localhost";
$username="root";
$pass_db="";
$dbname="socialwork";

$con=new mysqli($servername,$username,$pass_db,$dbname);
if($con->connect_error){
    die("Connection Failed".$con->connect_error);
}

$del_id = $_POST['del_id'];
$body = "null";
date_default_timezone_set("Canada/Saskatchewan");
$date = date('Y-m-d H:i:s');

$sql="UPDATE week1_patient set body='nothing', type_of_log='3'  where srno = '$del_id'";
//$rows = array();
print_r($del_id);
$result =mysqli_query($con, $sql);
mysqli_close($con);

?>


