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

$staff_id=$_POST["value1"];
$patient_id=$_POST["value2"];
$sql_query_select="select a_id from assign_staff where p_id='$patient_id' and s_id='$staff_id'";
$result =mysqli_query($con, $sql_query_select);
if(mysqli_num_rows($result)<=0){
        $sql_query="insert into assign_staff (p_id,s_id) values ('$patient_id','$staff_id')";
            if (mysqli_query($con, $sql_query)) {
                mysqli_close($con);
                echo "done";
            }
}
else{
    echo "not";
    mysqli_close($con);
}
?>