<?php
include "../model/db_con.php";
$sid=$_GET['sid'];
$query="UPDATE schedule SET
status='appr',reason='' WHERE  sid='".$sid."'"; 
$result=mysqli_query($con,$query);
header("location:../schedule_request.php");
?>