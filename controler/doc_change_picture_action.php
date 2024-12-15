<?php
session_name('docinfo');
session_start();
include "../model/db_con.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$did=$_SESSION['did'];
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
            $query="UPDATE doctor SET dimage='".$actualname."' WHERE did='".$did."'"; 
			$result=mysqli_query($con,$query);
			if (!empty($result)) 
			{
				$_SESSION['dimage']=$actualname;
                echo "<script>alert('Profile Picture update Successfully');window.location.href='../doc_profile.php';</script>";
		   }
		   else
		   {
			echo "<script>alert('Profile Picture update Unsuccessfull');window.location.href='../doc_profile.php';</script>";
		   }
		}
	}
	else
	{
		echo "<script>alert('Invalid Format');window.location.href='../doc_profile.php';</script>";
	}


}
?>