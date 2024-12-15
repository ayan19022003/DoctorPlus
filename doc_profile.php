<?php
  session_name('docinfo');
  session_start();
  include 'model/db_con.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Profile || Doctor Plus</title>
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
     <div class="pml">
        <div class="pmlb shadow">
            <img src="image/<?php echo $_SESSION['dimage'];?>" alt="image">
            <div class="pmlbb">
                <h2><?php echo "Dr. ".$_SESSION['dname']; ?></h2>
                <p><?php echo $_SESSION['dphone']; ?></p>
                <p><?php echo $_SESSION['daddress']; ?></p>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#docPassModal">Change Password</a>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#docPicModal">Change Profile Picture</a>
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
                    <td><?php echo $_SESSION['dname']; ?></td>
                  </tr>
                  <tr>
                    <td>Doctor Id</td>
                    <td><?php echo $_SESSION['did']; ?></td>
                  </tr>
                  <tr>
                    <td>Contact</td>
                    <td><?php echo $_SESSION['dphone']; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $_SESSION['email']; ?></td>
                  </tr>
                  <tr>
                    <td>Department</td>
                    <td><?php echo $_SESSION['dept']; ?></td>
                  </tr>
                  <tr>
                    <td>Age</td>
                    <td><?php echo $_SESSION['dage']; ?></td>
                  </tr>
                  <tr>
                    <td>Gender</td>
                    <td><?php echo $_SESSION['dgender']; ?></td>
                  </tr>
                  <tr>
                    <td>Education</td>
                    <td><?php echo $_SESSION['education']; ?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td><?php echo $_SESSION['daddress']; ?></td>
                  </tr>
                  <tr>
                    <td style="border:none;"></td>
                    <td style="border:none;"> <a href="#" style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#docUpdateModal">Update Profile</a></td>
                  </tr>
                </tbody>
              </table>
        </div>
     </div>
    </section>
    <footer>
        <p>&#169;&nbsp;All Rights are reserved by Doctor Plus</p>
    </footer>
  <!-- Modal -->
  <div class="modal fade" id="docUpdateModal" tabindex="-1" aria-labelledby="docUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="docUpdateModalLabel">Update Profile</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="padding: 0;">
          <form id="update-form" class="cform" action="controler/doc_update_profile_action.php" method="post" >
            <input type="hidden" name="pid" id="did" value="<?php echo $_SESSION['did']; ?>">
            <div class="inputbox">
              <label for="n"
                >Full Name <span id="ne">This field is requried</span></label
              >
              <input type="text" name="n" id="n" value="<?php echo $_SESSION['dname']; ?>" />
            </div>
            <div class="inputbox">
              <label for="ph"
                >Phone Number
                <span id="phe">Please enter Valid Phone Number</span></label
              >
              <input
                type="number"
                name="ph"
                id="ph"
                value="<?php echo $_SESSION['dphone']; ?>"
              />
            </div>
            <div class="inputbox">
              <label for="email"
                >Email <span id="depte">This field is requried</span></label
              >
              <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" />
            </div>
            <div class="inputbox">
              <label for="gen"
                >Gender <span id="gene">This field is requried</span></label
              >
              <select name="gen" id="gen">
              <?php
                if ($_SESSION['dgender']=="male")
                {
                  echo '<option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="trans">Transgender</option>';
                }
                elseif ($_SESSION['dgender']=="female")
                {
                  echo '<option value="female">Female</option>
                  <option value="male">Male</option>
                  <option value="trans">Transgender</option>';
                }
                elseif ($_SESSION['dgender']=="trans")
                {
                  echo '<option value="trans">Transgender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>';
                }
              ?>
              </select>
            </div>
            <div class="inputbox">
              <label for="age"
                >Age <span id="agee">This field is requried</span></label
              >
              <input type="number" name="age" id="age" value="<?php echo $_SESSION['dage']; ?>" />
            </div>
            <div class="inputbox">
              <label for="dept"
                >Weight in kg <span id="depte">This field is requried</span></label
              >
              <input type="text" name="dept" id="dept" value="<?php echo $_SESSION['dept']; ?>" />
            </div>
            <div class="inputbox">
              <label for="edu"
                >Education <span id="adde">This field is requried</span></label
              >
              <textarea name="edu" id="edu"><?php echo $_SESSION['education']; ?></textarea>
            </div>
            <div class="inputbox">
              <label for="add"
                >Address <span id="adde">This field is requried</span></label
              >
              <textarea name="add" id="add"><?php echo $_SESSION['daddress']; ?></textarea>
            </div>
            <input type="submit" value="Save Changes" name="update" />
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="docPassModal" tabindex="-1" aria-labelledby="docPassModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="docPassLabel">Change Password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="padding: 0;">
        <form id="pass-form" class="cform" action="controler/doc_change_password_action.php" method="post">
        <div class="inputbox">
              <label for="opwd"
                >Old Password <span id="opwde">This field is requried</span></label
              >
              <input type="password" name="opwd" id="opwd" placeholder="Enter your old password"/>
            </div>
            <div class="inputbox">
              <label for="npwd"
                >New Password <span id="npwde">This field is requried</span></label
              >
              <input type="password" name="npwd" id="npwd" placeholder="create a new password"/>
            </div>
            <input type="hidden" name="ppid" value="<?php echo $_SESSION['did']; ?>">
            <input type="submit" value="Save Changes" name="changepass" />
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="docPicModal" tabindex="-1" aria-labelledby=docPpicModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="docPicLabel">Change Profile Picture</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="padding: 0;">
        <form class="cform" id="pic-form" action="controler/doc_change_picture_action.php" method="post" enctype="multipart/form-data">
        <div class="inputbox">
              <label for="opwd"
                >Select Profile Picture <span id="opwde">This field is requried</span></label
              >
              <input class="form-control" type="file" name="image" id="image"/>
            </div>
            <input type="submit" value="Save Changes" name="changepic" />
        </form>
      </div>
    </div>
  </div>
</div>

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
