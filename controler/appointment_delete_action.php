<?php
include "../model/db_con.php";
$appid=$_POST['appid'];
$query = "DELETE FROM appointment WHERE appid ='".$appid."'";
$q = mysqli_query($con,$query);
if ($q) {
    echo 'success';
}
else {
    echo 'failure';
}
?>