<?php
session_name('docinfo');
session_start();
include "../model/db_con.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $opw = $_POST['opwd'];
    $npw = $_POST['npwd'];
    $did = $_SESSION['did'];
    $cpw = $_SESSION['dpassword'];
    if ($opw === $cpw) {
        $query="UPDATE doctor SET dpassword='".$npw."' WHERE did='".$did."'"; 
			$result=mysqli_query($con,$query);
			if (!empty($result)) 
			{
				$_SESSION['dpassword']=$npw;
                session_destroy();
                echo "<script>alert('Password Changed Successfully');window.location.href='../doctor-login.php';</script>";
		   }
		   else
		   {
			echo "<script>alert('Password change Failed');window.location.href='../doc_profile.php';
            </script>";
		   }
    }
    else if($opw != $cpw)
    {
        echo "<script>alert('Old Password does not match');window.location.href='../doc_profile.php';</script>";
    }
}
?>