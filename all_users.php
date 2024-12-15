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
    <title>Manage Users || Doctor Plus</title>
    <link rel="stylesheet" href="css/appointment.css">
    <link rel="stylesheet" href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.1.1-web/css/all.min.css">
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
                <a class="nav-link" aria-current="page" href="admin_dashboard.php"><i class="las la-home"></i>&nbsp;Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="all_users.php"><i class="las la-users"></i>&nbsp;All Users</a>
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
      <section class="appointment-body">
        <h1><i class="las la-users"></i>&nbsp;Total Users List. </h1>
        <div class="abmb shadow">
            <h3>List of Users.</h3>
            <div class="abb">
            <a href="signup.php" target="_blank" class="btn btn-primary" style="align-self:flex-start;border-radius: 0px;">Add Users</a>
            <table class="display appointment-table">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>P. Name</th>
                  <th>Phone</th>
                  <th>Age</th>
                  <th>Weight</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>Total App Count</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                  $query = "SELECT * FROM patient ORDER BY pid desc";
                  $q = mysqli_query($con,$query);
                  $num = mysqli_num_rows($q);
                  if ($num > 0) {
                    $sl = 1;
                    while ($data = mysqli_fetch_array($q)) {
                      ?>
                  <tr>
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $data['name']; ?></td>
                  <td><?php echo $data['phone']; ?></td>
                  <td><?php echo $data['age']; ?></td>
                  <td><?php echo $data['weight']; ?></td>
                  <td><?php echo $data['gender']; ?></td>
                  <td><?php echo $data['address']; ?></td>
                  <td>
                  <?php     
                       $query2 = "SELECT * FROM appointment WHERE pet_id='".$data['pid']."'";
                       $q2 = mysqli_query($con,$query2);
                       $num_app = mysqli_num_rows($q2);
                       if ($num_app < 10) {
                          echo "0".$num_app;
                       }
                       else{
                           echo $num_app;
                       }

                   ?>
                   </td>
                  <td><a class="btn btn-danger confirm-btn" data-id="<?php echo $data['pid']; ?>"><i class="las la-trash"></i></a></td>
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
    <script>
       $('.confirm-btn').click(function() {
    var pid = $(this).attr("data-id");
    if (confirm('Are you sure you want to delete?')) {
      $.ajax({
        url: 'controler/user_delete_action.php',
        method: 'POST',
        data: { pid: pid},
        success: function(response) {
          alert('Deleted Successfully');
          location.reload();
        },
        error: function(xhr, status, error) {
          alert('Delete Failed');
        }
      });
    }
  });
    </script>
</body>
</html>