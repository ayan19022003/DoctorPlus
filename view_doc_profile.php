<?php
  session_name('petinfo');
  session_start();
  include 'model/db_con.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Doctor Profile || Doctor Plus</title>
    <link
      rel="stylesheet"
      href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/fontawesome-free-6.1.1-web/css/all.min.css"
    />
    <link rel="stylesheet" href="css/profile.css" />
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
                <a class="nav-link" aria-current="page" href="index.php"><i class="las la-home"></i>&nbsp;Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="appointment.php"><i class="las la-calendar-check"></i>&nbsp;Appointment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="schedule_list.php"><i class="las la-calendar-day"></i>&nbsp;Schedule List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="doc_profile.php"><img class="nav-pic" src="image/<?php echo $_SESSION['image'];?>" alt="image" style="border-radius:100px;">&nbsp;<?php echo $_SESSION['name']; ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="controler/logout.php"><i class="las la-sign-out-alt"></i>&nbsp;Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <section class="profile-main">
    <?php 
                $did = $_REQUEST['did'];
                $query = "SELECT * FROM doctor WHERE did='".$did."'";
                $q = mysqli_query($con,$query);
                if ($num = mysqli_num_rows($q) > 0) {
                    while ($row = mysqli_fetch_assoc($q)) { ?>

<div class="pml">
        <div class="pmlb shadow">
            <img src="image/<?php echo $row['dimage'];?>" alt="image">
            <div class="pmlbb">
                <h2><?php echo "Dr. ".$row['dname']; ?></h2>
                <p><?php echo $row['email']; ?></p>
                <p><?php echo $row['daddress']; ?></p>
            </div>
        </div>
     </div>
     <div class="pmr">
        <div class="pmrb shadow">
            <h2>Personal Information</h2>
            <table class="table pre-info">
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td><?php echo $row['dname']; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $row['email']; ?></td>
                  </tr>
                  <tr>
                    <td>Department</td>
                    <td><?php echo $row['dept']; ?></td>
                  </tr>
                  <tr>
                    <td>Age</td>
                    <td><?php echo $row['dage']; ?></td>
                  </tr>
                  <tr>
                    <td>Gender</td>
                    <td><?php echo $row['dgender']; ?></td>
                  </tr>
                  <tr>
                    <td>Education</td>
                    <td><?php echo $row['education']; ?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><?php echo $row['daddress']; ?></td>
                  </tr>
                </tbody>
              </table>
        </div>
     </div>  
                    <?php
                    }
                }
            
            ?>
     
    </section>
    <footer>
        <p>&#169;&nbsp;All Rights are reserved by Doctor Plus</p>
        <a href="#">Admin</a>
    </footer>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <script src="assets/fontawesome-free-6.1.1-web/js/all.min.js"></script>
    <script src="js/form-valid.js"></script>
    <script>
      $(document).ready(function () {
        $(".display").DataTable();
      });
    </script>
  </body>
</html>
