<?php
    include "../model/db_con.php";
    if (isset($_POST['subperc'])) {
        $qid = $_POST['qid'];
        $rec = $_POST['rec'];
        $query = "INSERT INTO solution(qu_id,solution) VALUES ('$qid', '$rec')";
        $q = mysqli_query($con,$query);
        if ($q) {
            echo "<script>alert('Prescription created Successfully');window.location.href='../doc_appointment.php';</script>";
        } else {
            echo "<script>alert('Prescription Failed!!');window.location.href='../solution.php';</script>";
        }
        
    }
?>