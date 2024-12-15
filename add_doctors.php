<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Doctors || Doctor Plus</title>
    <link
      rel="stylesheet"
      href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/fontawesome-free-6.1.1-web/css/all.min.css"
    />
    <link rel="stylesheet" href="css/signup.css" />
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css" />
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
                <a class="nav-link" href="all_doctors.php"><i class="las la-arrow-left"></i>&nbsp;Go back</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <section class="login-body">
      <div class="logi" style="flex-direction:column;justify-content:space-around;">
        <img src="image/juicy-medical-prescription.png" style="width:35%" />
        <img src="image/pablita-doctors-first-aid-kit.png" style="width:35%" />
        <img src="image/morphis-glass-thermometer.png" style="width:35%" />
        <img src="image/biro-blue-doctor-stethoscope.png" style="width:35%" />
      </div>
      <div class="login-main">
        <form id="signup-form" action="controler/add_doctor_action.php" method="post">
          <h1>Add Doctor</h1>
          <div class="inputbox">
            <label for="n"
                >Dr. Name <span id="ne">This field is requried</span></label
              >
              <input type="text" name="dn" id="n">
            </div>
            <div class="inputbox">
            <label for="sy"
                >Depertment <span id="depte">This field is requried</span></label
              >
              <input type="text" name="dept" id="dept">
            </div>
            <div class="inputbox">
            <label for="sy"
                >Phone <span id="phe">Enter a valid Phone number</span></label
              >
              <input type="number" name="dph" id="ph">
            </div>
            <div class="inputbox">
            <label for="sy"
                >Password <span id="pwde">This field is requried</span></label
              >
              <input type="password" name="dpwd" id="pwd">
            </div>
            <div class="inputbox">
            <label for="sy"
                >Email <span id="weie">This field is requried</span></label
              >
              <input type="email" name="demail" id="wei">
            </div>
            <div class="inputbox">
            <label for="sy"
                >Age <span id="agee">This field is requried</span></label
              >
              <input type="number" name="dage" id="age">
            </div>
            <div class="inputbox">
            <label for="sy"
                >Gender <span id="gene">This field is requried</span></label
              >
              <select name="dgen" id="gen">
                <option value="select">--Select--</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="trans">Transgender</option>
              </select>
            </div>
            <div class="inputbox">
            <label for="sy"
                >Address <span id="adde">This field is requried</span></label
              >
              <textarea name="dadd" id="add"></textarea>
            </div>
            <div class="inputbox">
            <label for="sy"
                >Education <span id="dedue">This field is requried</span></label
              >
              <textarea name="dedu" id="dedu"></textarea>
            </div>
           <input type="submit" value="Add" name="add_doctor" />
        </form>
      </div>
    </section>
    <footer>
      <p>&#169;&nbsp;All Rights are reserved by Doctor Plus</p>
    </footer>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <script src="assets/fontawesome-free-6.1.1-web/js/all.min.js"></script>
    <script>
      $(document).ready(function () {
        $(".display").DataTable();
      });
    </script>
    <script src="js/form-valid.js"></script>
  </body>
</html>
