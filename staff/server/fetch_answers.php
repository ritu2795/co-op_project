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

$tempsessionvar=$_POST['p_id'];
 $sql = "SELECT week1_topics.content as con, week1_patient.body, week1_patient.date_time, week1_patient.type_of_log from week1_patient INNER JOIN week1_topics ON week1_patient.w1_id = week1_topics.srno where p_id='$tempsessionvar'";
 $rows = array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
  
    $rows[]=$row;
      }
header( "Content-type: application/json" );
echo json_encode($rows);
mysqli_close($con);
 

?>