<?php
  session_name('admininfo');
  session_start();
  include 'model/db_con.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Schedule || Doctor Plus</title>
    <link rel="stylesheet" href="css/appointment.css">
    <link rel="stylesheet" href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/line_awesome/1.3.0/css/line-awesome.min.css">
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <style>
      .dataTables_wrapper{
        width: 120%!important;
      }
      .abb{
        overflow-x: auto;
      }
    </style>
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
                <a class="nav-link" aria-current="page" href="admin_dashboard.php"><i class="las la-home"></i>&nbsp;Dashboard</a>
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
                <a class="nav-link active" href="admin_schedule.php"><i class="las la-calendar-day"></i>&nbsp;Manage Schedule</a>
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
      <section class="appointment-body">
        <h1><i class="las la-calendar-check"></i>&nbsp;Total Schedule List. </h1>
        <div class="abmb shadow">
            <h3>List of Appointment.</h3>
            <a href="add_schedule.php" class="btn btn-primary" style="align-self:flex-start;border-radius: 0px;">Request Schedule</a>
            <div class="abb">
            <table class="display appointment-table">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Dr. Name</th>
                  <th>Deprt.</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Reason (if Rejected)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                  $query = "SELECT schedule.*,doctor.dname,doctor.dept FROM schedule,doctor Where schedule.d_id=doctor.did";
                  $q = mysqli_query($con,$query);
                  $num = mysqli_num_rows($q);
                  if ($num > 0) {
                    $sl = 1;
                    while ($data = mysqli_fetch_array($q)) {
                      ?>
                  <tr>
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $data['dname']; ?></td>
                  <td><?php echo $data['dept']; ?></td>
                  <td><?php echo date('g:i A' , strtotime($data['start'])); ?></td>
                  <td><?php echo date('g:i A' , strtotime($data['end'])); ?></td>
                  <td><?php echo $data['date']; ?></td>
                    <?php
                      if ($data['status'] == "pen") {
                        echo "<td>Pending....</td>";
                      } else if ($data['status'] == "appr") {
                        echo "<td style='color:#02a325;'>Approved</td>";
                      }
                      else
                      {
                        echo "<td style='color:#cf0c26;'>Rejected</td>";
                      }
                      
                    ?>
                  <td><?php echo $data['reason']; ?></td>
                  <td><?php echo '<a href="controler/delete_schedule_action.php?sid='.$data['sid'].'" class="btn btn-danger"><i class="las la-trash"></i></a>';?></td>
                </tr>


                  <?php
                    $sl++;
                    }
                  }
                  
                ?>
              </tbody>
            </table>
          </div>
            </div>
      </section>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <script src="assets/fontawesome-free-6.1.1-web/js/all.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/form-valid.js"></script>
    <script>
      $(document).ready(function () {
        $('.display').DataTable();
      });
    </script>
</body>
</html>