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
$tempsessionvar=$_SESSION['loginid'];
$sql="select srno,w1_id,p_id,date_time,body,type_of_log,flag_inserted_once from week1_patient where p_id='$tempsessionvar'";
$rows = array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $rows[]=$row;
      }

$sql1="select srno,p_id,w1_topics_id,check_complete from week1_complete_read where p_id='$tempsessionvar'";
$rows1 = array();
$result =mysqli_query($con, $sql1);
while($row = mysqli_fetch_assoc($result)) {
    $rows1[]=$row;
}

header( "Content-type: application/json" );
echo json_encode(array($rows,$rows1));
mysqli_close($con);
?>
