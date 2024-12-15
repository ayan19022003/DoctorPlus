<?php
session_name('petinfo');
session_start();
include 'model/db_con.php';
if (isset($_SESSION['pid'])) {
    echo "Logged in";
} 
else {
    echo "Login to book";
}
?>