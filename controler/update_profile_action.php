<?php
session_name('petinfo');
session_start();
include "../model/db_con.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$pid=$_POST['pid'];
	$n = $_POST['n'];
    $ph = $_POST['ph'];
    $gen = $_POST['gen'];
    $age = $_POST['age'];
    $wei = $_POST['wei'];
    $add = $_POST['add'];
	$query="UPDATE patient SET name='".$n."', phone='".$ph."',age='".$age."',gender='".$gen."', weight='".$wei."',address='".$add."',image='".$_SESSION['image']."' WHERE pid='".$pid."'"; 
			$result=mysqli_query($con,$query);
			if (!empty($result)) 
			{
				$_SESSION['name']=$n;
				$_SESSION['phone']=$ph;
				$_SESSION['age']=$age;
				$_SESSION['gender']=$gen;
				$_SESSION['weight']=$wei;
				$_SESSION['address']=$add;
				echo "<script>alert('Profile updated Successfully');window.location.href='../profile.php';</script>";
		   }
		   else
		   {
			echo "<script>alert('profile update Unsuccessfull');window.location.href='../profile.php';</script>";
		   }



	// if(change_student_profile($fname,$lname,$email,$phoneno,$dob,$gender,$address,$id,$actualname)){
	// 	$_SESSION['fname']=$fname;
	// 	$_SESSION['email'] = $email;
	// 	$_SESSION['phone_no']=$phoneno;
	// 	$_SESSION['lname']=$lname;
	// 	$_SESSION['address']=$address;
	// 	$_SESSION['dob']=$dob;
	// 	$_SESSION['gender']=$gender;
	// 	echo "<script>alert('profile update successfully');</script>";
	// 	header("location:../profilee.php");
	// }
	// else{
	// 	echo "<script>alert('profile update unsuccessfully');</script>";
	// }
}
?>