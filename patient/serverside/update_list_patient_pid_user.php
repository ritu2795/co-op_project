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


$pname=$_POST["p_name"];
$pid=$_POST["p_id"];
$password=$_POST["password"];
$s_q_1=$_POST["security_question1"];


//check username exits or not
$count2=0;
$sql="select p_username from login_p where p_username='$pname'";
$rows = array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $count2 = $count2 + 1;
 }
  
//p_id exists or not in patient
$count=0;
$sql="select p_id from patient where p_id='$pid'";
$rows = array();
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $count = $count + 1;
}

//p_id exists or not in login_p
$count1=0;     
$sql="select p_id from login_p where p_id='$pid'";
$result =mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $count1 = $count1 + 1;
}
     
if($count==0){
    echo "Not Valid Patient ID";
}

else if($count==1 && $count1 == 0 && $count2==0)
{

    $sql="insert into login_p (p_id,p_username, p_pass, security_question1,reset_link) values('$pid','$pname','$password','$s_q_1',0)";
    mysqli_query($con, $sql);

    $sql1="insert into week1_complete_read (p_id,w1_topics_id, check_complete) values('$pid','1','0'),('$pid','2','0'),('$pid','3','0')";
    mysqli_query($con, $sql1);
    
    $sql2="insert into week1_patient (p_id,w1_id, body,type_of_log,flag_inserted_once) values('$pid','1','nothing','3','0'),('$pid','2','nothing','3','0'),('$pid','3','nothing','3','0')";
    mysqli_query($con, $sql2);
    
     $sql3="insert into week2_complete_read (p_id,w2_topics_id, check_complete) values('$pid','1','0'),('$pid','2','0'),('$pid','3','0'),('$pid','4','0'),('$pid','5','0'),('$pid','6','0'),('$pid','7','0'),('$pid','8','0'),('$pid','9','0')";
    mysqli_query($con, $sql3);
    
    $sql4="insert into week2_patient (p_id,w2_id, body,type_of_log,flag_inserted_once) values('$pid','1','nothing','3','0'),('$pid','2','nothing','3','0'),('$pid','3','nothing','3','0'),('$pid','4','nothing','3','0'),('$pid','5','nothing','3','0'),('$pid','6','nothing','3','0'),('$pid','7','nothing','3','0'),('$pid','8','nothing','3','0'),('$pid','9','nothing','3','0')";
    mysqli_query($con, $sql4); 

        if (true) {
        echo "Registered";
    } else {
        echo "Error updating record: " . mysqli_error($con);
        }   

    }
    else if($count==1 && $count1 == 1){
        echo "Account Already exist with the given patient ID";
    }

    else if($count2>=1){
        echo "Not Valid -Username Already Exist";
    }
mysqli_close($con);

?>