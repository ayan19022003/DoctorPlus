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
    <title>Doctor Schedule || Doctor Plus</title>
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
                <a class="nav-link" href="doc_appointment.php"><i class="las la-calendar-check"></i>&nbsp;Appointment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="schedule_request.php"><i class="las la-calendar-day"></i>&nbsp;Schedule Requests</a>
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
        <h1><i class="las la-calendar-day"></i>&nbsp;Your Schedule List. </h1>
        <div class="abmb shadow">
            <h3>List of Schedule.</h3>
            <div class="abb">
            <table class="display appointment-table">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Starting Time</th>
                  <th>Ending Time</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $today = date('Y-m-d');
                $times = time();
                $time = date('H:i:s', $times);
                  $query = "SELECT * FROM schedule WHERE d_id ='".$_SESSION['did']."' AND DATE(date) >= '".$today."' AND TIME(end) > '".$time."'";
                  $q = mysqli_query($con,$query);
                  $num = mysqli_num_rows($q);
                  if ($num > 0) {
                  $sl = 1;
                    while ($data = mysqli_fetch_array($q)) {
                      ?>
                  <tr>
                  <td><?php echo $sl; ?></td>
                  <td><?php echo date('g:i A',strtotime($data['start'])); ?></td>
                  <td><?php echo date('g:i A',strtotime($data['end']));; ?></td>
                  <td><?php echo $data['date']; ?></td>
                    <?php
                      if ($data['status'] == "pen") {
                        echo '<td><a href="controler/approve_schedule_action.php?sid='.$data['sid'].'" class="btn btn-success">Approve</a>&nbsp;<a class="btn btn-danger reject-btn" data-id="'.$data['sid'].'">Reject</a></td>';
                      } elseif ($data['status'] == "appr") {
                        echo '<td style="color:#02a325;"><a class="btn btn-secondary disabled">Approved</a></td>';
                      }
                      else
                      {
                        echo '<td style="color:#cf0c26;"><a class="btn btn-secondary disabled">Rejected</a></td>';
                      }
                      
                    ?>
                </tr>


                  <?php
                    $sl ++;
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
    <script>
$(document).ready(function(){
  $(".reject-btn").click(function(){
    var reason = prompt("Reason:");
    var sid = $(this).attr("data-id");
    $.post("controler/reject_schedule_action.php", {reason: reason, sid: sid}, function(){
      location.reload();
    });
  });
});
</script>
</body>
</html>