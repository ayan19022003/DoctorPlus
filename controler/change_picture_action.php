<?php
session_name('petinfo');
session_start();
include "../model/db_con.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$pid=$_SESSION['pid'];
	$valid=array("jpg","png","jpeg","JPG","PNG","JPEG","jfif","JFIF","GIF","gif");
	$path="../image/";
	$filename=$_FILES['image']['name'];
	$filesize=$_FILES['image']['size'];
	$temname=$_FILES['image']['tmp_name'];
	$ext= pathinfo($filename,PATHINFO_EXTENSION);
	if(in_array($ext,$valid))
	{
		$actualname= time().$filename;
		if(move_uploaded_file($temname,$path.$actualname))
		{
            $query="UPDATE patient SET image='".$actualname."' WHERE pid='".$pid."'"; 
			$result=mysqli_query($con,$query);
			if (!empty($result)) 
			{
				$_SESSION['image']=$actualname;
                echo "<script>alert('Profile Picture update Successfully');window.location.href='../profile.php';</script>";
		   }
		   else
		   {
			echo "<script>alert('Profile Picture update Unsuccessfull');window.location.href='../profile.php';</script>";
		   }
		}
	}
	else
	{
		echo "<script>alert('Invalid Format');window.location.href='../profile.php';</script>";
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