<?php
session_start();
$servername="localhost";
$username="root";
$pass_db="";
$dbname="socialwork";
$tempsessionvar=$_SESSION['loginid'];
$con=new mysqli($servername,$username,$pass_db,$dbname);
if($con->connect_error){
    die("Connection Failed".$con->connect_error);
}
if(isset($_POST['element']))
{
    $element=$_POST['element']; 
    $extraarrayvar=explode("&",$element);
    $sql="UPDATE week1_patient set body='$extraarrayvar[1]', type_of_log='1', flag_inserted_once='1'  where srno = '$extraarrayvar[0]'";
    $result =mysqli_query($con, $sql);
    mysqli_close($con);
}
?>
