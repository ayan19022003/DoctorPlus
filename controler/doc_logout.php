<?php 
session_name('docinfo');
session_start();
session_destroy();
echo "<script>window.location.href='../doctor-login.php';</script>";
?>