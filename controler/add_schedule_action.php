<?php
    include "../model/db_con.php";
    if (isset($_POST['add_schedule'])) {
        $did = $_POST['drname'];
        $stime = $_POST['stime'];
        $etime = $_POST['etime'];
        $date = $_POST['date'];
        $query = "INSERT INTO schedule(date, start, end, d_id, status) VALUES ('$date', '$stime', '$etime', '$did', 'pen')";
        $q = mysqli_query($con,$query);
        if ($q) {
            echo "<script>alert('Schedule Added sucessfully');window.location.href='../admin_schedule.php';</script>";
        } else {
            echo "<script>alert('Schedule add failed !!');window.location.href='../add_schedule.php';</script>";
        }
    }
?>