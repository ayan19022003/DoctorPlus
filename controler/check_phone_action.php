<?php
include '../model/db_con.php';

if (isset($_POST['phone'])) {
  $phone = $_POST['phone'];
  $query = "SELECT pid FROM patient WHERE phone='".$phone."'";
  $q = mysqli_query($con,$query);
  if (mysqli_num_rows($q) > 0) {
    echo 'exists';
  } else {
    echo 'not_exists';
  }
}
?>