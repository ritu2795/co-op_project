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
$rows1 = array('name'=>$tempsessionvar);

$sql="SELECT check_complete FROM week1_complete_read WHERE w1_topics_id = 10 and p_id = '$tempsessionvar'";
$rows5=array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $rows5[]=$row;
}
 $sql="SELECT check_complete FROM week2_complete_read WHERE w2_topics_id = 9 and p_id = '$tempsessionvar'";
$rows6=array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $rows6[]=$row;
}

$sql="SELECT flag_inserted_once FROM week1_patient WHERE w1_id = 10 and p_id = '$tempsessionvar'";
$rows8=array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $rows8[]=$row;
}
 $sql="SELECT flag_inserted_once FROM week2_patient WHERE w2_id = 9 and p_id = '$tempsessionvar'";
$rows9=array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $rows9[]=$row;
}

$sql="select firstname from patient where p_id='$tempsessionvar'";
$rows2=array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $rows2[]=$row;
}

header( "Content-type: application/json" );
echo json_encode(array($rows5,$rows1,$rows2,$rows6,$rows8,$rows9));
mysqli_close($con);
?>