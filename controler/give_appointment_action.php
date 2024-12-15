<?php
    include "../model/db_con.php";
    if (isset($_POST['enquiry'])) {
        $sy = $_POST['sy'];
        $dm = $_POST['dm'];
        $app = $_POST['appid'];
        $query = "INSERT INTO query(ap_id, symptom, des_more) VALUES ('".$app."', '".$sy."', '".$dm."')";
        $q = mysqli_query($con,$query);
        if ($q) {

            echo "<script>alert('Appointment Submitted successfully!!, Please Wait few minutes and refresh the page for receving Prescription..');window.location.href='../appointment.php';</script>";
        } else {
            echo "alert('Try Again');window.location.href='../appointment.php';";
            
        }
        
    }
?>