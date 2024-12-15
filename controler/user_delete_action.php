<?php
include "../model/db_con.php";
$pid=$_POST['pid'];
$query = "DELETE FROM patient WHERE pid ='".$pid."'";
$q = mysqli_query($con,$query);
if ($q) {
    echo 'success';
}
else {
    echo 'failure';
}
?>