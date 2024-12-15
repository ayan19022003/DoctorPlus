<?php
include "../model/db_con.php";
$did=$_POST['did'];
$query="DELETE FROM doctor WHERE did='".$did."'";
$result=mysqli_query($con,$query);
echo json_encode(array('success' => true));
?>