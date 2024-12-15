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
    <title>Manage Doctors || Doctor Plus</title>
    <link rel="stylesheet" href="css/appointment.css">
    <link rel="stylesheet" href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/line_awesome/1.3.0/css/line-awesome.min.css">
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <style>
      /* .dataTables_wrapper{
        width: 130%!important;
      }
      .abb{
        overflow-x: auto;
      } */
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
                <a class="nav-link active" aria-current="page" href="all_doctors.php"><i class="las la-user-friends"></i>&nbsp;All Doctors</a>
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
        <h1><i class="las la-user-friends"></i>&nbsp;Total Doctors List. </h1>
        <div class="abmb shadow">
            <h3>List of Doctors.</h3>
            <div style="display:flex;">
            <a href="add_doctors.php" class="btn btn-primary" style="align-self:flex-start;border-radius: 0px;">Add Doctors</a>&nbsp;&nbsp;
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#docPicModal" style="align-self:flex-start;border-radius: 0px;">Import</a>
            </div>
            <div class="abb">
            <table class="display appointment-table">
              <thead>
                <tr>
                  <th>Dr. id</th>
                  <th>Dr. Name</th>
                  <th>Deprt.</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>Education</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * FROM doctor ORDER BY did desc";
                  $q = mysqli_query($con,$query);
                  $num = mysqli_num_rows($q);
                  if ($num > 0) {
                    while ($data = mysqli_fetch_array($q)) {
                      ?>
                  <tr>
                  <td><?php echo $data['did']; ?></td>
                  <td><?php echo $data['dname']; ?></td>
                  <td><?php echo $data['dept']; ?></td>
                  <td><?php echo $data['dphone']; ?></td>
                  <td><?php echo $data['email']; ?></td>
                  <td><?php echo $data['dage']; ?></td>
                  <th><?php echo $data['dgender']; ?></th>
                  <th><?php echo $data['daddress']; ?></th>
                  <th><?php echo $data['education']; ?></th>
                  <th><a class="btn btn-danger confirm-btn" data-id="<?php echo $data['did']; ?>"><i class="las la-trash"></i></a></th>
                </tr>


                  <?php
                    }
                  }
                  
                ?>
              </tbody>
            </table>
          </div>
            </div>
      </section>


      <div class="modal fade" id="docPicModal" tabindex="-1" aria-labelledby=docPpicModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="docPicLabel">Import CSV file</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="padding: 0;">
        <form class="cform" id="pic-form" action="controler/add_doctor_csv_action.php" method="post" enctype="multipart/form-data">
        <div class="inputbox">
              <label for="opwd"
                >Select csv file <span id="opwde">This field is requried</span></label
              >
              <input class="form-control" type="file" name="csv" id="image"/>
            </div>
            <input type="submit" value="Import" name="doc_import" />
        </form>
      </div>
    </div>
  </div>
</div>
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
    var did = $(this).attr("data-id");
    if (confirm('Are you sure you want to delete?')) {
      $.ajax({
        url: 'controler/doc_delete_action.php',
        method: 'POST',
        data: { did: did},
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