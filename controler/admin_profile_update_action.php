<?php
session_name('admininfo');
session_start();
include "../model/db_con.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id=$_POST['id'];
    $aid=$_POST['aid'];
	$an = $_POST['an'];
    $aph = $_POST['aph'];
    $aemail = $_POST['aemail'];
    $aadd = $_POST['aadd'];
	$query="UPDATE admin SET aid='".$aid."', admin_name='".$an."', phone='".$aph."',email='".$aemail."',address='".$aadd."',image='".$_SESSION['image']."' WHERE id='".$id."'"; 
			$result=mysqli_query($con,$query);
			if (!empty($result)) 
			{
                $_SESSION['aid']=$aid;
				$_SESSION['admin_name']=$an;
				$_SESSION['phone']=$aph;
				$_SESSION['email']=$aemail;
				$_SESSION['address']=$aadd;
				echo "<script>alert('Profile updated Successfully');window.location.href='../admin_profile.php';</script>";
		   }
		   else
		   {
			echo "<script>alert('profile update Unsuccessfull');window.location.href='../admin_profile.php';</script>";
		   }
}
?>