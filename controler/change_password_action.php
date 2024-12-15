<?php
session_name('petinfo');
session_start();
include "../model/db_con.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $opw = md5($_POST['opwd']);
    $npw = md5($_POST['npwd']);
    $pid = $_SESSION['pid'];
    $cpw = $_SESSION['password'];
    if ($opw == $cpw) {
        $query="UPDATE patient SET password='".$npw."' WHERE pid='".$pid."'"; 
			$result=mysqli_query($con,$query);
			if (!empty($result)) 
			{
				$_SESSION['password']=$npw;
                session_destroy();
                echo "<script>alert('Password Changed Successfully');window.location.href='../login.php';</script>";
		   }
		   else
		   {
			echo "<script>alert('Password change Unsuccessfull');window.location.href='../profile.php';
            </script>";
		   }
    }
    else
    {
        echo "<script>alert('Old Password does not match');window.location.href='../profile.php';</script>";
    }
}
?>