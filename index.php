<?php
  session_name('petinfo');
  session_start();
  include 'model/db_con.php'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HomePage || Doctor Plus</title>
    <link
      rel="stylesheet"
      href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/fontawesome-free-6.1.1-web/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/line_awesome/1.3.0/css/line-awesome.min.css">
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <style>
      #no_data_alert{
        display: none;
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
                <a class="nav-link active" aria-current="page" href="index.php"><i class="las la-home"></i>&nbsp;Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="appointment.php"><i class="las la-calendar-check"></i>&nbsp;Appointment</a>
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
    <section class="sec2">
      <div class="sec2l">
      <?php
        if (isset($_SESSION['pid'])) {
        ?>
           <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
          Welcome, <?php echo "<b>".$_SESSION['name']."</b>" ;?> Login Success 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
        else {
          
        }
      ?>
        <div class="mb-3" style="width: 100%">
          <label for="doc-date" class="form-label"
            >Enter date to check the Doctor Avaliability</label
          >
          <input
            type="date"
            class="form-control"
            id="doc-date"
            aria-describedby="emailHelp"
          />
        </div>
        <table class="table" id="my_table">
          <thead>
            <tr>
              <th scope="col">SL</th>
              <th scope="col">Dr. Name</th>
              <th scope="col">Start Time</th>
              <th scope="col">End Time</th>
              <th scope="col">Deprt.</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">-</th>
              <td>---- ----</td>
              <td>--:-- --</td>
              <td>--:-- --</td>
              <td>----</td>
              <td>Select a Date</td>  
            </tr>
          </tbody>
        </table>
        <div class="alert alert-danger" role="alert" id="no_data_alert" style="width: 100%">
          No Doctors are Avaliable at this Date Please Change the date
        </div>
        <?php
        if (isset($_SESSION['pid'])) {
            echo "";
        }
        else {
          ?>
          <div class="alert alert-warning" role="alert" style="width: 100%">
          Please Login for Book Apointment
        </div>
        <?php
        }
      ?>
      </div>
      <div class="sec2r">
        <img src="image/index.jpg" alt="image" />
      </div>
    </section>
    <footer>
        <p>&#169;&nbsp;All Rights are reserved by Doctor Plus</p>
        <?php 
          if (isset($_SESSION['pid'])) {
            
          }
          else
          {
            echo "<a href='admin_login.php' target='_blank'>Admin</a>";
          }
        ?>
    </footer>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <script src="assets/fontawesome-free-6.1.1-web/js/all.min.js"></script>
    <script src="js/main.js"></script>
    <script>
      $(document).ready(function () {
          // get the input field and table container element
var dateInput = $('#doc-date');
// var myTableContainer = $('#my_table_container');

// add an event listener to the input field that triggers on change
dateInput.on('change', function() {
  // get the selected date value from the input field
  var selectedDate = this.value;
  
  // create a new AJAX request to retrieve data based on the selected date
  $.ajax({
    url: 'controler/index_find_doc_action.php',
    type: 'GET',
    data: { date: selectedDate },
    success: function(data) {
      if (data === 'no_data') {
        // if no data is available, show the bootstrap alert and hide the table
        $('#no_data_alert').css('display','flex');
        $('#my_table').hide();
      } else {
        // if data is available, update the table content and show the table
        $('#my_table tbody').html(data);
        $('#no_data_alert').css('display','none');
        $('#my_table').show();
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.error('Error: ' + textStatus + ' - ' + errorThrown);
    }
  });
});
      });
    </script>
  </body>
</html>
