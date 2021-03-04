<?php
session_start();
$servername="localhost";
$username="root";
$pass_db="";
$dbname="socialwork";

$fn=$_POST["firstname"];
$ln=$_POST["lastname"];
$add=$_POST["address"];
$city=$_POST["city"];
$pr=$_POST["province"];
$ct=$_POST["country"];
$ph=$_POST["phonenumber"];
$count=0;
$con=new mysqli($servername,$username,$pass_db,$dbname);
if($con->connect_error){
    die("Connection Failed".$con->connect_error);
    echo "servername";
}

$sql="select p_id from patient where phonenumber='$ph'";
$rows2 = array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $count=1;
}

if($count==0){
    
    $sql="INSERT INTO patient (firstname,lastname,address,city,province,country,phonenumber) VALUES ('$fn', '$ln', '$add', '$city', '$pr', '$ct', '$ph')";
    $result =mysqli_query($con, $sql);
    $sql="select p_id from patient where phonenumber='$ph'";
    $result =mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result)) {
    $rows[]=$row;
      }

    mysqli_close($con);

    header( "Content-type: application/json" );
    echo json_encode($rows);
    }
else{
    echo "Already Exist";
}
?>
