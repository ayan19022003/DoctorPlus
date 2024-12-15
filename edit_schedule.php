<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Schedule || Doctor Plus</title>
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
                <a class="nav-link" href="admin_schedule.php"><i class="las la-arrow-left"></i>&nbsp;Go back</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <section class="login-body">
      <div class="logi" style="flex-direction:column;justify-content:center;">
        <img src="image/daily-calendar.png" style="width:50%" />
      </div>
      <div class="login-main">
        <form id="signup-form" method="post">
          <h1>Edit Schedule</h1>
          <input type="hidden" name="pid" id="pid">
            <div class="inputbox">
            <label for="sy"
                >Dr. Name <span id="sye">This field is requried</span></label
              >
             <select name="drname" id="drname">
                <option value="">Akash Roy</option>
                <option value="">Suman Kar</option>
             </select>
            </div>
            <div class="inputbox">
              <label for="sy"
                >Start Time <span id="ne">This field is requried</span></label
              >
              <input type="time" name="stime" id="n" />
            </div>
            <div class="inputbox">
              <label for="sy"
                >End Time <span id="pwde">This field is requried</span></label
              >
              <input type="time" name="etime" id="pwd" />
            </div>
            <div class="inputbox">
              <label for="sy"
                >Date <span id="agee">This field is requried</span></label
              >
              <input type="date" name="date" id="age" />
            </div>
            <input type="submit" value="Save Changes" name="enquiry" />
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
