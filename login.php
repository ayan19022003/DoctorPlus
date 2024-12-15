<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login || Doctor Plus</title>
    <link
      rel="stylesheet"
      href="assets/bootstrap-5.2.0-dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/fontawesome-free-6.1.1-web/css/all.min.css"
    />
    <link rel="stylesheet" href="css/login.css" />
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
                <a class="nav-link" href="appointment.php"><i class="las la-calendar-check"></i>&nbsp;Appointment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="signup.php"><i class="las la-sign-in-alt"></i>&nbsp;Sign up</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <section class="login-body">
        <div class="logi">
            <img src="image/sammy-line-clipboard-with-medical-form.gif" alt="image">
        </div>
        <div class="login-main">
            <form id="login-form" action="controler/login_action.php" method="post">
                <h1>Login</h1>
                <div class="inputbox">
                    <label for="ph">Phone Number <span id="phe">Please enter Valid Phone Number</span></label>
                    <input type="number" name="ph" id="ph">
                </div>
                <div class="inputbox">
                    <label for="pwd">Password <span id="pwde">This field is requried</span></label>
                    <input type="password" name="pwd" id="pwd">
                </div>
                  <input type="submit" value="Login" name="login">
                <span>Dont have an account ? <a href="signup.php">Sign Up</a></span>
            </form>
        </div>
    </section>
    <footer>
        <p>&#169;&nbsp;All Rights are reserved by Doctor Plus</p>
        <a href="#">Admin</a>
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
