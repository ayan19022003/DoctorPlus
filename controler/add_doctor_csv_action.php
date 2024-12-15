<?php
include "../model/db_con.php";
if (isset($_POST['doc_import'])) 
{
$img= "../image/blank-profile-pic.jpg";
$filename = $_FILES['csv']['tmp_name'];
$file = fopen($filename, "r");
while (($data = fgetcsv($file)) !== FALSE) {
    // Insert the data into the database
    $sql = "INSERT INTO doctor (dname, dpassword, dphone, email, dept, daddress, dimage, dage, dgender, education) 
            VALUES ('" . $data[0] . "', '" . $data[1] . "', '" . $data[2] . "','".$data[3]."','".$data[4]."','".$data[5]."','".$img."','".$data[6]."','".$data[7]."','".$data[8]."')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Added Successfully');window.location.href='../all_doctors.php';</script>";
    }
}

// Close the file and the database connection
fclose($file);


}
?>