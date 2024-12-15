<?php
  session_name('admininfo');
  session_start();
  include 'model/db_con.php'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard || Doctor Plus</title>
    <link
      rel="stylesheet"
      href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/fontawesome-free-6.1.1-web/css/all.min.css"
    />
    <link rel="stylesheet" href="css/doc_dashboard.css" />
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/line_awesome/1.3.0/css/line-awesome.min.css">
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="image/logo.png" alt="logo" style="height: 4rem;width: 4rem;"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="admin_dashboard.php"><i class="las la-home"></i>&nbsp;Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="all_users.php"><i class="las la-users"></i>&nbsp;All Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="all_doctors.php"><i class="las la-user-friends"></i>&nbsp;All Doctors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_appointment.php"><i class="las la-calendar-check"></i>&nbsp;Appointment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_schedule.php"><i class="las la-calendar-day"></i>&nbsp;Manage Schedule</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_Profile.php"><img class="nav-pic" src="image/<?php echo $_SESSION['image'];?>" alt="image" style="border-radius:100px;">&nbsp;<?php echo $_SESSION['admin_name']; ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="controler/admin_logout.php"><i class="las la-sign-out-alt"></i>&nbsp;Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <section class="sec2">
      <div class="sec2l">
      <?php
        if (isset($_SESSION['aid'])) {
        ?>
           <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
          Welcome, <?php echo "<b>".$_SESSION['admin_name']."</b>" ;?> Login Success 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
        else {
          
        }
      ?>
      <h1>Welcome To Admin Panel</h1>
      <div class="sec2l-b sec-admin">
       <a href="all_users.php" class="sec2l-card">
            <span>
                <?php 
                    $query = "SELECT * FROM patient";
                    $q = mysqli_query($con,$query);
                    $num_user = mysqli_num_rows($q);
                    if ($num_user < 10) {
                       echo "0".$num_user;
                    }
                    else{
                        echo $num_user;
                    }
                ?>
            </span>
            <div class="s2l-cb">
                <span><i class="las la-users"></i></span>
                <span>Total Users</span>
            </div>
       </a>
       <a href="all_doctors.php" class="sec2l-card" style="background:#4d4dff;">
            <span>
            <?php 
                    $query = "SELECT * FROM doctor";
                    $q = mysqli_query($con,$query);
                    $num_doc = mysqli_num_rows($q);
                    if ($num_doc < 10) {
                       echo "0".$num_doc;
                    }
                    else{
                        echo $num_doc;
                    }
                ?>
            </span>
            <div class="s2l-cb">
                <span><i class="las la-user-friends"></i></span>
                <span>Total Doctors</span>
            </div>
       </a>
       <a href="admin_appointment.php" class="sec2l-card" style="background:#228b22;">
            <span>
            <?php 
                    $query = "SELECT * FROM appointment";
                    $q = mysqli_query($con,$query);
                    $num_app = mysqli_num_rows($q);
                    if ($num_app < 10) {
                       echo "0".$num_app;
                    }
                    else{
                        echo $num_app;
                    }
                ?>
            </span>
            <div class="s2l-cb">
                <span><i class="las la-calendar-check"></i></span>
                <span>Total Appointments</span>
            </div>
       </a>
       <a href="admin_schedule.php" class="sec2l-card" style="background:#4cbb17;">
            <span>
            <?php 
                    $query = "SELECT * FROM schedule";
                    $q = mysqli_query($con,$query);
                    $num_sch = mysqli_num_rows($q);
                    if ($num_sch < 10) {
                       echo "0".$num_sch;
                    }
                    else{
                        echo $num_sch;
                    }
                ?>
            </span>
            <div class="s2l-cb">
                <span><i class="las la-calendar-day"></i></span>
                <span>Total Schedules</span>
            </div>
       </a>
       </div>
      </div>
      <div class="sec2r">
        <img src="image/undraw_medicine_b1ol.png" alt="image" />
      </div>
    </section>
    <footer>
        <p>&#169;&nbsp;All Rights are reserved by Doctor Plus</p>
    </footer>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <script src="assets/fontawesome-free-6.1.1-web/js/all.min.js"></script>
    <script src="js/main.js"></script>
    <script>
      $(document).ready(function () {
        $(".display").DataTable();
      });
    </script>
  </body>
</html>
