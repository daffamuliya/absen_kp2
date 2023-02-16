<?php
session_start();

require 'conn.php';

if (isset($_SESSION["login"])) {
  header("Location: login_user.php");
}


if (isset($_POST["login"])) {

  $username = $_POST ["username"];
  $password = $_POST ["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
   
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"]=true;
      $_SESSION["username"]=$row["username"];  //Mendaftarkan session username dari row username
      if ($row["level"] === "Admin") {
      header("Location: admin.php");
      exit;
      } else if ($row["level"] === "Mahasiswa" && $row["status"] === "0" ) {
        header("Location: setting.php");
      } else {
        header("Location: mahasiswa.php");
      }
     
    } else {
      echo "<script>alert('Username dan Password Salah atau Belum Terdaftar!');window.location='login_user.php'</script>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSS -->
    <link rel="icon" type="image/png" href="img/pln.png" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="css/util.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    
  </head>
  <body>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <div class="login100-form-title" style="background-image: url(img/pln_bg.png)">
            <img src="img/pln.png" alt="" width="15%" style="margin-bottom: 10px" />
            <span class="login100-form-title-1" style="color: #29a8df"> Absensi PKL PT. PLN UID SUMBAR </span>
          </div>

          <form action="" method="post" class="login100-form validate-form" >
            <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
              <span class="label-input100"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/></svg> </span>
              <input class="input100" type="text" name="username" placeholder="Enter username" />
              <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
              <span class="label-input100"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg></span>
              <input class="input100" type="password" name="password" placeholder="Enter password" />
              <span class="focus-input100"></span>
            </div>

            <div class="flex-sb-m w-full p-b-30">
              <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" />
                <a  href="download_apk.php?nama_apk=app-debug.apk">Download APK</a>
              </div>

              <div>
                <a href="register.php" class="txt1"> Register </a>
              </div>
            </div>

            <div class="container-login100-form-btn">
              <button class="login100-form-btn" type ="submit" name ="login" >Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- JavaScript -->

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
