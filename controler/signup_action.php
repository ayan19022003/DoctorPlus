<?php
    include "../model/db_con.php";
    if (isset($_POST['signup'])) {
        $n = $_POST['n'];
        $ph = $_POST['ph'];
        $pwd = md5($_POST['pwd']);
        $gen = $_POST['gen'];
        $age = $_POST['age'];
        $wei = $_POST['wei'];
        $add = $_POST['add'];
        $img= "../image/blank-profile-pic.jpg";
        $cq = "SELECT pid FROM patient WHERE phone='".$ph."'";
        $cr = mysqli_query($con,$cq);
        if (mysqli_num_rows($cr) > 0) {
            echo "<script>alert('The Phone number is already Present');window.location.href='../signup.php';</script>";
        } else {
            $query = "INSERT INTO patient(name, phone, password, gender, age, weight, address, image) VALUES ('$n', '$ph', '$pwd', '$gen', '$age', '$wei', '$add','$img')";
        $q = mysqli_query($con,$query);
        if ($q) {
            echo "<script>window.location.href='../login.php';</script>";
        }
        }
    }
?>