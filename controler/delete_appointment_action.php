<?php
include "../model/db_con.php";
$sid=$_REQUEST['sid'];
$pid=$_GET['pid'];
$query = "DELETE FROM appointment WHERE pet_id =".$pid." AND sch_id =".$sid;
$q = mysqli_query($con,$query);
if ($q) {
    echo "<script>window.location.href='../schedule_list.php'</script>";
}
?>