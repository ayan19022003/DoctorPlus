<?php
	session_name('docinfo');
    session_start();
    include "../model/db_con.php";
    if (isset($_POST['login'])) {
        $did = $_POST['did'];
        $pwd = $_POST['pwd'];
        $query = "SELECT * FROM doctor WHERE did='$did' AND dpassword='$pwd'";
        $q = mysqli_query($con, $query);
        $row=mysqli_num_rows($q);
	    $record[]=mysqli_fetch_array($q);
	if($row>0)
	{
		$_SESSION['did']=$record[0]['did'];
		$_SESSION['dname']=$record[0]['dname'];
		$_SESSION['dphone'] = $record[0]['dphone'];
		$_SESSION['dpassword'] = $record[0]['dpassword'];
        $_SESSION['dept'] = $record[0]['dept'];
		$_SESSION['email'] = $record[0]['email'];
		$_SESSION['dage'] = $record[0]['dage'];
		$_SESSION['dgender'] = $record[0]['dgender'];
        $_SESSION['daddress'] = $record[0]['daddress'];
        $_SESSION['dimage'] = $record[0]['dimage'];
		$_SESSION['education'] = $record[0]['education'];

		echo "<script>window.location.href='../doc_dashboard.php';</script>";
	}
	else
	{
		echo "<script>alert('Incorrect Doctor ID or password !!!');window.location.href='../doctor-login.php';</script>";
	}
        
    }
?>