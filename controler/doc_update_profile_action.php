<?php
session_name('docinfo');
session_start();
include "../model/db_con.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$n = $_POST['n'];
    $ph = $_POST['ph'];
    $email = $_POST['email'];
    $gen = $_POST['gen'];
    $age = $_POST['age'];
    $dept = $_POST['dept'];
    $edu = $_POST['edu'];
    $add = $_POST['add'];
	$query="UPDATE doctor SET dname='".$n."', dphone='".$ph."', email='".$email."',dage='".$age."',dgender='".$gen."', dept='".$dept."',education='".$edu."',daddress='".$add."',dimage='".$_SESSION['dimage']."' WHERE did='".$_SESSION['did']."'"; 
			$result=mysqli_query($con,$query);
			if (!empty($result)) 
			{
				$_SESSION['dname']=$n;
				$_SESSION['dphone']=$ph;
                $_SESSION['email']=$email;
                $_SESSION['dept']=$dept;
                $_SESSION['education']=$edu;
				$_SESSION['dage']=$age;
				$_SESSION['dgender']=$gen;
				$_SESSION['daddress']=$add;
				echo "<script>alert('Profile updated Successfully');window.location.href='../doc_profile.php';</script>";
		   }
		   else
		   {
			echo "<script>alert('profile update Failed');window.location.href='../doc_profile.php';</script>";
		   }
}