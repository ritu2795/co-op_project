<?php
session_start();
$servername = "localhost";
$username = "root";
$pass_db = "";
$dbname = "socialwork";

$con = new mysqli($servername, $username, $pass_db, $dbname);
if ($con->connect_error) {
  die("Connection Failed" . $con->connect_error);
}

$sql = "select s_id,firstname,lastname from staff";
$rows1 = array();
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $rows1[] = $row;
}
$sql = "select p_id,firstname,lastname from patient";
$rows2 = array();
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $rows2[] = $row;
}
$sql = "SELECT a.a_id,a.p_id,a.s_id,p.firstname as p_f,p.lastname as p_l,s.firstname as s_f,s.lastname as s_l 
FROM assign_staff a
INNER JOIN staff s
    on a.s_id = s.s_id
INNER JOIN patient p
    on a.p_id = p.p_id";
$rows3 = array();
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $rows3[] = $row;
}
$data1 = array('staff' => $rows1, 'patient' => $rows2, 'assign' => $rows3);
echo json_encode($data1);
header("Content-type: application/json");
mysqli_close($con);
