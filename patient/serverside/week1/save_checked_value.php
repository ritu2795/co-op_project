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
if(isset($_POST['tem']))
{  

    $element=$_POST['tem']; 
    $sql="UPDATE week1_complete_read set check_complete='1'  where w1_topics_id = '$element'";
    $result =mysqli_query($con, $sql);
    mysqli_close($con);
    echo ($element);
}
?>
