<?php
include "../model/db_con.php";
$sid=$_GET['sid'];
$query="DELETE FROM schedule WHERE sid='".$sid."'"; 
$result=mysqli_query($con,$query);
if ($result) {
    echo "<script>alert('Schedule successfully Deleted!!!');window.location.href='../admin_schedule.php';</script>";
}
?>