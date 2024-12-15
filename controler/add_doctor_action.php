<?php
    include "../model/db_con.php";
    if (isset($_POST['add_doctor'])) {
        $dn = $_POST['dn'];
        $dept = $_POST['dept'];
        $dph = $_POST['dph'];
        $dpwd = $_POST['dpwd'];
        $demail = $_POST['demail'];
        $dage = $_POST['dage'];
        $dgen = $_POST['dgen'];
        $dadd = $_POST['dadd'];
        $dedu = $_POST['dedu'];
        $img= "../image/blank-profile-pic.jpg";
        $query = "INSERT INTO doctor(dname, dpassword, dphone, email, dept, daddress, dimage, dage, dgender, education) VALUES ('$dn', '$dpwd', '$dph', '$demail', '$dept', '$dadd', '$img','$dage','$dgen','$dedu')";
        $q = mysqli_query($con,$query);
        if ($q) {
            echo "<script>alert('Doctor Added sucessfully');window.location.href='../all_doctors.php';</script>";
        } else {
            echo "<script>alert('Doctor Added unsucessfull');window.location.href='../add_doctors.php';</script>";
        }
        
    }
?>