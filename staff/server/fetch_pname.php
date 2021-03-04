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
 $sql = "SELECT patient.firstname, login_p.p_id from patient INNER JOIN login_p ON login_p.p_id = patient.p_id";
 $rows = array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $rows[]=$row;
      }
header( "Content-type: application/json" );
echo json_encode($rows);
mysqli_close($con);
 

?>