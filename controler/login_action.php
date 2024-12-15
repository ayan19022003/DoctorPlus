<?php
    session_name('petinfo');
    session_start();
    include "../model/db_con.php";
    if (isset($_POST['login'])) {
        $ph = $_POST['ph'];
        $pwd = md5($_POST['pwd']);
        $query = "SELECT * FROM patient WHERE phone='$ph' AND password='$pwd'";
        $q = mysqli_query($con, $query);
        $row=mysqli_num_rows($q);
	    $record[]=mysqli_fetch_array($q);
	if($row>0)
	{
		$_SESSION['pid']=$record[0]['pid'];
		$_SESSION['name']=$record[0]['name'];
		$_SESSION['phone'] = $record[0]['phone'];
		$_SESSION['password'] = $record[0]['password'];
        $_SESSION['gender'] = $record[0]['gender'];
        $_SESSION['age'] = $record[0]['age'];
        $_SESSION['weight'] = $record[0]['weight'];
        $_SESSION['address'] = $record[0]['address'];
        $_SESSION['image'] = $record[0]['image'];

		echo "<script>window.location.href='../index.php';</script>";
	}
	else
	{
		echo "<script>alert('Incorrect Phone number or password !!!');window.location.href='../login.php';</script>";
	}
        
    }
?>