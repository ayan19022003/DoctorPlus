<?php
  session_name('petinfo');
  session_start();
  include 'model/db_con.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment || Doctor Plus</title>
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
                <a class="nav-link" aria-current="page" href="index.php"><i class="las la-home"></i>&nbsp;Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="appointment.php"><i class="las la-calendar-check"></i>&nbsp;Appointment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="schedule_list.php"><i class="las la-calendar-day"></i>&nbsp;Schedule List</a>
              </li>
              <?php
        if (isset($_SESSION['pid'])) {
        ?>    
              <li class="nav-item">
                <a class="nav-link" href="Profile.php"><img class="nav-pic" src="image/<?php echo $_SESSION['image'];?>" alt="image" style="border-radius:100px;">&nbsp;<?php echo $_SESSION['name']; ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="controler/logout.php"><i class="las la-sign-out-alt"></i>&nbsp;Logout</a>
              </li>
               
                  <?php
        }
        else {
          ?>
          <li class="nav-item">
               <div class="dropdown nav-link">
                    <a onclick="myFunction()" class="dropbtn"><i class="las la-user"></i>&nbsp;Login</a>
                    <div id="myDropdown" class="dropdown-content">
                      <a href="login.php">As a Patient</a>
                      <a href="doctor-login.php">As a Doctor</a>
                    </div>
                  </div>
            </li>
                  <?php
        }
      ?>
            </ul>
          </div>
        </div>
      </nav>
      <section class="appointment-body">
        <h1><i class="las la-calendar-check"></i>&nbsp;Your Appointment List. </h1>
        <div class="abmb shadow">
            <h3>List of Appointment.</h3>
            <div class="abb">
            <table class="display appointment-table">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Dr. Name</th>
                  <th>Deprt.</th>
                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if (isset($_SESSION['pid'])) {
                  date_default_timezone_set('Asia/Kolkata');
                  $status = 'appr';
                  $today = date('Y-m-d');
                  $times = time();
                  $time = date('H:i:s', $times);
                  $query = "SELECT appointment.*,schedule.*,doctor.* FROM appointment,schedule,doctor WHERE appointment.sch_id=schedule.sid AND schedule.d_id=doctor.did AND appointment.pet_id='".$_SESSION['pid']."'";
                  $q = mysqli_query($con,$query);
                  $num = mysqli_num_rows($q);
                  if ($num > 0) {
                    $sl =1;
                    while ($data = mysqli_fetch_array($q)) {
                        ?>
                         <tr>
                  <td><?php echo $sl; ?></td>
                  <?php echo '<td><a href="view_doc_profile.php?did='.$data['did'].'" style="color:#000;text-decoration:none;">'.$data['dname'].'</a></td>'; ?>
                  <td><?php echo $data['dept']; ?></td>
                  <td><?php echo $data['date']; ?></td>
                  <td><?php echo date("g:i A", strtotime($data['start'])); ?></td>
                  <td><?php echo date("g:i A", strtotime($data['end'])); ?></td>
                  <td>
                    <?php
                          $query4 = "SELECT query.*,solution.* FROM query,solution WHERE solution.qu_id=query.qid AND query.ap_id='".$data['appid']."'";
                          $q4 = mysqli_query($con,$query4);
                          $num2 = mysqli_num_rows($q4);
                          $date = $data['date'];
                          $query3 = "SELECT ap_id FROM query WHERE ap_id = '".$data['appid']."'";
                          $q3 = mysqli_query($con,$query3);
                          $num = mysqli_num_rows($q3);
                          if ($num > 0) {
                            if ($num2 > 0) {
                              echo '<a href="Prescription.php?appid='.$data['appid'].' && dname='.$data['dname'].' && dept='.$data['dept'].' && date='.$data['date'].'" target="_blank" class="btn btn-primary get-prec"><i class="las la-download"></i></a>&nbsp;<a class="btn btn-danger confirm-btn" data-id=" '.$data['appid'].'"><i class="las la-trash"></i></a>';
                            } else {
                               echo "Pending...";
                            }
                          } else {
                            if ($today < $date) {
                              echo ".........";
                            }
                            elseif ($today == $date) {
                              if ($time >= $data['start'] && $time < $data['end']) {
                                echo '<a class="btn btn-primary" href="give_appointment.php?appid='.$data['appid'].'">View</a>';
                              }
                              elseif($time < $data['start'])
                              {
                                echo ".........";
                              }
                              elseif($time > $data['end']){
                                echo 'Dissmissed';
                              }
                            }
                            elseif ($today > $date)
                            {
                              echo 'Dissmissed';
                            }
                          }
                    ?>
                  </td>
                </tr>
                   <?php
                    $sl++;
                    }
                      }
                  
                } else {
                  echo "Login first";
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
        var appid = $(this).attr("data-id");
    if (confirm('Are you sure you want to delete?')) {
      $.ajax({
        url: 'controler/appointment_delete_action.php',
        method: 'POST',
        data: { appid: appid},
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