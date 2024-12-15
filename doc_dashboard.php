<?php
  session_name('docinfo');
  session_start();
  include 'model/db_con.php'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Dashboard || Doctor Plus</title>
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
                <a class="nav-link active" aria-current="page" href="doc_dashboard.php"><i class="las la-home"></i>&nbsp;Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="doc_appointment.php"><i class="las la-calendar-check"></i>&nbsp;Appointment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="schedule_request.php"><i class="las la-calendar-day"></i>&nbsp;Schedule Requests</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="doc_Profile.php"><img class="nav-pic" src="image/<?php echo $_SESSION['dimage'];?>" alt="image" style="border-radius:100px;">&nbsp;<?php echo $_SESSION['dname']; ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="controler/doc_logout.php"><i class="las la-sign-out-alt"></i>&nbsp;Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <section class="sec2">
      <div class="sec2l">
      <?php
        if (isset($_SESSION['did'])) {
        ?>
           <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
          Welcome, <?php echo "<b>".$_SESSION['dname']."</b>" ;?> Login Success 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
        else {
          
        }
      ?>
      <h1>Welcome To, Doctor Plus.</h1>
      <p>Please Note your Schedule Dates and get appointment on time.</p>
      <div class="sec2l-b">
       <a href="doc_appointment.php" class="sec2l-card">
            <span><?php 
                    $query = "SELECT * FROM appointment WHERE doc_id ='".$_SESSION['did']."'";
                    $q = mysqli_query($con,$query);
                    $num_app = mysqli_num_rows($q);
                    if ($num_app < 10) {
                       echo "0".$num_app;
                    }
                    else{
                        echo $num_app;
                    }
                ?></span>
            <div class="s2l-cb">
                <span><i class="las la-calendar-check"></i></span>
                <span>Total Appoiments</span>
            </div>
       </a>
       <a href="schedule_request.php" class="sec2l-card" style="background:#4d4dff;">
            <span><?php 
                    $query = "SELECT * FROM schedule WHERE d_id ='".$_SESSION['did']."' AND status='pen'";
                    $q = mysqli_query($con,$query);
                    $num_sch = mysqli_num_rows($q);
                    if ($num_sch < 10) {
                       echo "0".$num_sch;
                    }
                    else{
                        echo $num_sch;
                    }
                ?></span>
            <div class="s2l-cb">
                <span><i class="las la-calendar-day"></i></span>
                <span>Total New Schedule Requests</span>
            </div>
       </a>
       </div>
      </div>
      <div class="sec2r">
        <img src="image/doc_dashboard.jpg" alt="image" />
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
