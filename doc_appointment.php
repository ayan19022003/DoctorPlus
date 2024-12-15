<?php
  session_name('docinfo');
  session_start();
  include 'model/db_con.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment || Doctor Plus</title>
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
                <a class="nav-link" aria-current="page" href="doc_dashboard.php"><i class="las la-home"></i>&nbsp;Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="doc_appointment.php"><i class="las la-calendar-check"></i>&nbsp;Appointment</a>
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
      <section class="appointment-body">
        <h1><i class="las la-calendar-check"></i>&nbsp;Your Appointment List. </h1>
        <div class="abmb shadow">
            <h3>List of Appointment.</h3>
            <div class="abb">
            <table class="display appointment-table">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>patient Name</th>
                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  date_default_timezone_set('Asia/Kolkata');
                  $status = 'appr';
                  $today = date('Y-m-d');
                  $times = time();
                  $time = date('H:i:s', $times);
                  $query = "SELECT appointment.*,schedule.*,patient.*,doctor.* FROM appointment,schedule,doctor,patient WHERE appointment.sch_id=schedule.sid AND schedule.d_id=doctor.did AND appointment.pet_id=patient.pid AND appointment.doc_id='".$_SESSION['did']."'";
                  $q = mysqli_query($con,$query);
                  $num = mysqli_num_rows($q);
                  if ($num > 0) {
                    $sl =1;
                    while ($data = mysqli_fetch_array($q)) {
                        ?>
                         <tr>
                  <td><?php echo $sl; ?></td>
                  <td><?php echo $data['name']; ?></td>
                  <td><?php echo $data['date']; ?></td>
                  <td><?php echo date("g:i A", strtotime($data['start'])); ?></td>
                  <td><?php echo date("g:i A", strtotime($data['end'])); ?></td>
                  <td>
                    <?php
                          $query2 = "SELECT qid FROM query WHERE ap_id = '".$data['appid']."'";
                          $q2 = mysqli_query($con,$query2);
                          $num = mysqli_num_rows($q2);
                          $data2 = $q2->fetch_assoc();
                          if ($num > 0) {
                            $query3 = "SELECT qu_id FROM solution WHERE qu_id = '".$data2['qid']."'";
                          $q3 = mysqli_query($con,$query3);
                          $num = mysqli_num_rows($q3);
                          if ($num > 0) {
                              echo 'Completed....';                        
                            }
                          else
                          {
                            echo '<a href="solution.php?qu_id='.$data2['qid'].'" class="btn btn-primary">View</a>';
                          }
                          } else {
                            echo "Query is not submitted";
                          }
                    ?>
                  </td>
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
      

      <div class="modal fade" id="queryModal" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="queryModalLabel">Update Profile</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="padding: 0;">
          <form id="query-form" class="cform">
            <input type="hidden" name="pid" id="pid" value="<?php echo $_SESSION['pid']; ?>">
            <div class="inputbox">
              <label for="sy"
                >Symptoms <span id="sye">This field is requried</span></label
              >
              <input type="text" name="sy" id="sy" />
            </div>
            <div class="inputbox">
              <label for="dm"
                >Describe more <span id="dme">This field is requried</span></label
              >
              <textarea name="dm" id="dm"></textarea>
            </div>
            <div class="inputbox">
              <label for="dimg"
                >Photo (Not compusery)<span id="sye">This field is requried</span></label
              >
              <input type="file" class="form-control" name="dimg" id="dimg" />
            </div>
            <input type="submit" value="Submit" name="enquiry" />
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
</body>
</html>