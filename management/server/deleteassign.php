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

$title=$_POST["value1"];
$sql_query_delete="delete from assign_staff where a_id='$title'";
$result =mysqli_query($con, $sql_query_delete);

if(mysqli_query($con, $sql_query_delete)){ 
    mysqli_close($con);
    echo "done"; 
}

?>