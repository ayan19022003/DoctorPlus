<?php
include "../model/db_con.php";
$sid=$_REQUEST['sid'];
$pid=$_GET['pid'];
$end=$_GET['end'];
$did=$_GET['doc_id'];
$date=$_GET['date'];
date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');
$times = time();
$time = date('H:i:s', $times);
if ($today == $date && $time > $end) {
    echo "<script>alert('Sorry Time is Exceeted.');</script>";
    header("location:../schedule_list.php");
} else {
        $query2="INSERT INTO appointment(pet_id,doc_id,sch_id)VALUES(".$pid.",".$did.",".$sid.")"; 
            $result=mysqli_query($con,$query2);
        if ($result) {
            echo "<script>alert('Appointment added successfully.');</script>";
            header("location:../schedule_list.php");
        }
    else
    {
        echo "alert('Not Found');";
    }
}
?>