<?php
	session_name('admininfo');
    session_start();
    include "../model/db_con.php";
    if (isset($_POST['login'])) {
        $aid = $_POST['aid'];
        $pwd = $_POST['pwd'];
        $query = "SELECT * FROM admin WHERE aid='$aid' AND password='$pwd'";
        $q = mysqli_query($con, $query);
        $row=mysqli_num_rows($q);
	    $record[]=mysqli_fetch_array($q);
	if($row>0)
	{
		$_SESSION['id']=$record[0]['id'];
        $_SESSION['aid']=$record[0]['aid'];
		$_SESSION['admin_name']=$record[0]['admin_name'];
		$_SESSION['phone'] = $record[0]['phone'];
		$_SESSION['password'] = $record[0]['password'];
		$_SESSION['email'] = $record[0]['email'];
		$_SESSION['address'] = $record[0]['address'];
        $_SESSION['image'] = $record[0]['image'];

		echo "<script>window.location.href='../admin_dashboard.php';</script>";
	}
	else
	{
		echo "<script>alert('Incorrect Admin ID or password !!!');window.location.href='../admin_login.php';</script>";
	}
        
    }
?>