<?php
session_name('admininfo');
session_start();
include "../model/db_con.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id=$_SESSION['id'];
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
            $query="UPDATE admin SET image='".$actualname."' WHERE id='".$id."'"; 
			$result=mysqli_query($con,$query);
			if (!empty($result)) 
			{
				$_SESSION['image']=$actualname;
                echo "<script>alert('Profile Picture update Successfully');window.location.href='../admin_profile.php';</script>";
		   }
		   else
		   {
			echo "<script>alert('Profile Picture update Unsuccessfull');window.location.href='../admin_profile.php';</script>";
		   }
		}
	}
	else
	{
		echo "<script>alert('Invalid Format');window.location.href='../doc_profile.php';</script>";
	}


}
?>