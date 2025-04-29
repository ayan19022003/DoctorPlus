<?php
  session_name('petinfo');
  session_start();
  include 'model/db_con.php';
  $appid = $_GET['appid'];
  $dname = $_GET['dname'];
  $dept = $_GET['dept'];
  $date = $_GET['date'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription || Doctor Plus</title>
    <link rel="stylesheet" href="css/Prescription.css">
    <link rel="stylesheet" href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/line_awesome/1.3.0/css/line-awesome.min.css">
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
</head>
<body>
    <section class="main" id="content">
      <div class="top-prec">
        <img src="image/logo.png" alt="logo">
        <div class="tpr">
          <h4>Doctor Plus</h4>
          <p>Contai<br>
            Purba Medinipur<br>
            West Bengal, 721401<br>
            Ph: 1234567890<br>
            youremail@gmail.com
          </p>
        </div>
      </div>
      <table class="prec2" cellspacing="0">
        <thead>
          <tr>
            <th>App id</th>
            <th>Patient id</th>
            <th>Dr. Name</th>
            <th>patient Name</th>
            <th>Deprt.</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $appid; ?></td>
            <td><?php echo $_SESSION['pid']; ?></td>
            <td><?php echo $dname; ?></td>
            <td><?php echo $_SESSION['name']; ?></td>
            <td><?php echo $dept; ?></td>
            <td><?php echo $date; ?></td>
          </tr>
        </tbody>
        </table>
        <table class="prec3" cellspacing="0">
          <tbody>
          <?php
                $query = "SELECT query.*,appointment.* FROM query,appointment WHERE query.ap_id=appointment.appid AND appointment.appid='".$appid."'";
                $q = mysqli_query($con,$query);
                $num = mysqli_num_rows($q);
                if ($num > 0) {
                  while ($data = mysqli_fetch_assoc($q)) {
                    ?>
                    <tr>
              <td>Symptoms</td>
              <td style="text-align: end;"><?php echo $data['symptom'] ;?></td>
            </tr>
            <tr>
              <td>More About</td>
              <td style="text-align: end;"><?php echo $data['des_more'] ;?></td>
            </tr>
                <?php
                  }
                  
                }
              ?>
          </tbody>
          </table>
          <table class="prec4" cellspacing="0">
            <tbody>
            <?php
                $query2 = "SELECT query.*,solution.* FROM query,solution WHERE solution.qu_id=query.qid AND query.ap_id='".$appid."'";
                $q2 = mysqli_query($con,$query2);
                $num2 = mysqli_num_rows($q2);
                if ($num2 > 0) {
                  while ($data2 = mysqli_fetch_assoc($q2)) {
                    ?>
                     <tr>
                <td>What doctor says ?</td>
              </tr>
              <tr>
                <td><?php echo $data2['solution'] ;?></td>
              </tr>
                <?php
                  }
                  
                }
              ?>
            </tbody>
            </table>
    </section>
    <button class="dwnbtn">Download PDF</button>

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
$(document).ready(function() {
    $('.dwnbtn').click(function() {
        window.print();
    });
});
</script>
</body>
</html>
