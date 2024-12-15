<?php
session_name('petinfo');
session_start();
include "../model/db_con.php";
// retrieve the selected date value from the URL query string
$date = $_GET['date'];
date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');
$times = time();
$time = date('H:i:s', $times);
// create a SQL query to retrieve data based on the selected date
$sql = "SELECT schedule.*,doctor.* FROM schedule,doctor WHERE schedule.d_id = doctor.did AND schedule.date = '$date'";
$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
  $html = '';
        $sl =1;
        foreach ($result as $row) {
            if (isset($_SESSION['pid'])) {
            if ($today > $date){
                    $html .= '<tr><td>' . $sl . '</td><td>' . $row['dname'] . '</td><td>' . date("g:i A", strtotime($row['start'])) . '</td><td>' . date("g:i A", strtotime($row['end'])) . '</td><td>' . $row['dept'] . '</td><td>Time Exceeted</td></tr>';
          }
          else if ($today == $date && $time > $row['end'] ){
            $html .= '<tr><td>' . $sl . '</td><td>' . $row['dname'] . '</td><td>' . date("g:i A", strtotime($row['start'])) . '</td><td>' . date("g:i A", strtotime($row['end'])) . '</td><td>' . $row['dept'] . '</td><td>Time Exceeted</td></tr>';
  }
          else{
            $query2 = "SELECT pet_id, sch_id, COUNT(*) FROM appointment WHERE pet_id = '".$_SESSION['pid']."' AND sch_id = '".$row['sid']."' GROUP BY pet_id,sch_id";
            $q2 = mysqli_query($con,$query2);
            $num = mysqli_num_rows($q2);
            if ($num == 1) {
                $html .= '<tr><td>' . $sl . '</td><td>' . $row['dname'] . '</td><td>' . date("g:i A", strtotime($row['start'])) . '</td><td>' . date("g:i A", strtotime($row['end'])) . '</td><td>' . $row['dept'] . '</td><td><a href="controler/delete_appointment_action.php?sid='.$row['sid'].' && pid='.$_SESSION['pid'].'" class="btn btn-danger">Cancel</a></td></tr>';
            }
            else {
                $html .= '<tr><td>' . $sl . '</td><td>' . $row['dname'] . '</td><td>' . date("g:i A", strtotime($row['start'])) . '</td><td>' . date("g:i A", strtotime($row['end'])) . '</td><td>' . $row['dept'] . '</td><td><a href="controler/add_appointment_action.php?sid='.$row['sid'].' && pid='.$_SESSION['pid'].' && end='.$row['end'].' && doc_id='.$row['d_id'].' && date='.$row['date'].'" class="btn btn-primary">Book</a></td></tr>';
            }
          }  
            }
            if (!isset($_SESSION['pid'])) {
                $html .= '<tr><td>' . $sl . '</td><td>' . $row['dname'] . '</td><td>' . date("g:i A", strtotime($row['start'])) . '</td><td>' . date("g:i A", strtotime($row['end'])) . '</td><td>' . $row['dept'] . '</td><td>Login to book</td></tr>';
            }
          $sl++;
          }
          echo $html;
          }
 else {
  // if no data is available, output a string to indicate this
  echo 'no_data';
}



?>