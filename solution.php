<?php
  session_name('docinfo');
  session_start();
  include 'model/db_con.php';
  $qid = $_GET['qu_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Solution || Doctor Plus</title>
    <link
      rel="stylesheet"
      href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/fontawesome-free-6.1.1-web/css/all.min.css"
    />
    <link rel="stylesheet" href="css/solution.css" />
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
                <a class="nav-link" href="schedule_request.php"><i class="las la-calendar-day"></i>&nbsp;Schedule Requests</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="doc_profile.php"><img class="nav-pic" src="image/<?php echo $_SESSION['dimage'];?>" alt="image" style="border-radius:100px;">&nbsp;<?php echo $_SESSION['dname']; ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="controler/doc_logout.php"><i class="las la-sign-out-alt"></i>&nbsp;Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <section class="profile-main">
     
     <div class="pmr">
        <div class="pmrb shadow">
            <h2>Appointment Quiries</h2>
            <table class="prec3" cellspacing="0">
          <tbody>
          <?php 
              $query = "SELECT * FROM query WHERE qid='".$qid."'";
              $q = mysqli_query($con,$query);
              $num = mysqli_num_rows($q);
              if ($num > 0) {
               while ($data = mysqli_fetch_array($q)) {
                ?>
                
                <tr>
              <td class="td1">Symptoms</td>
              <td style="text-align: end;"><?php echo $data['symptom'];?></td>
            </tr>
            <tr>
              <td class="td1">More About</td>
              <td style="text-align: end;width:70%"><?php echo $data['des_more'];?></td>
            </tr>
                <?php
               }
              }
            ?>
          </tbody>
          </table>
        </div>
     </div>

     <div class="pmr">
        <div class="pmrb shadow">
            <div class="form-floating mb-3">
            <form id="sol-form" class="cform" action="controler/add_solution_action.php" method="post" >
            <input type="hidden" name="qid" id="qid" value="<?php echo $qid;?>">
            <div class="inputbox">
              <label for="add"
                >Doctor's Recomendation <span id="adde">This field is requried</span></label
              >
              <textarea name="rec" id="rec" rows="7" cols="60"></textarea>
            </div>
            <input type="submit" value="Submit Prescription" name="subperc" />
          </form>
        </div>
     </div>
    </section>
    <footer>
        <p>&#169;&nbsp;All Rights are reserved by Doctor Plus</p>
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
    <script>
      $(document).ready(function () {
        $('#sol-form').submit(function () { 
        var rec = $('#rec');
        var rece = $('#adde');
        if (rec.val() == "") {
            rece.css('visibility','visible');
            rec.css('borderColor','#cf0c26');
            return false;
        }
       });
      });
    </script>
  </body>
</html>