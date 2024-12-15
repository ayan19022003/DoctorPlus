<?php
include "../model/db_con.php";
$sid=$_POST['sid'];
$reason=$_POST['reason'];
$query="UPDATE schedule SET
status='rej', reason='".$reason."' WHERE  sid='".$sid."'"; 
$result=mysqli_query($con,$query);
header("location:../schedule_request.php");
?>