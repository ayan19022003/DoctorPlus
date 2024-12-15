<?php
session_name('admininfo');
session_start();
include "../model/db_con.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $opw = $_POST['opwd'];
    $npw = $_POST['npwd'];
    $aid = $_SESSION['id'];
    $cpw = $_SESSION['password'];
    if ($opw == $cpw) {
        $query="UPDATE admin SET password='".$npw."' WHERE id='".$aid."'"; 
			$result=mysqli_query($con,$query);
			if (!empty($result)) 
			{
				$_SESSION['password']=$npw;
                session_destroy();
                echo "<script>alert('Password Changed Successfully');window.location.href='../admin_login.php';</script>";
		   }
		   else
		   {
			echo "<script>alert('Password change Unsuccessfull');window.location.href='../admin_profile.php';
            </script>";
		   }
    }
    else
    {
        echo "<script>alert('Old Password doesnt match');window.location.href='../admin_profile.php';</script>";
    }
}
?>