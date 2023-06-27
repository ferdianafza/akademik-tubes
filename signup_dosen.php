<?php

require ("function.php");

if ( isset($_POST["register"])) {
  
  if (registrasi_dosen($_POST) > 0 ) {
    echo "<script>
            alert('Dosen Berhasil terdatar!!!, silahkan Login')
          </script>" ;
  } else {

    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
    }
    .h-custom {
    height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
    .h-custom {
    height: 100%;
    }
    }
  </style>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="image/logo.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST">
          <center><h3>Daftar Dosen</h3></center>
          <div class="form-outline mb-4">
            <input type="text" name="nid" id="form3Example3" class="form-control form-control-lg"
              placeholder="NID" />
          </div>
          <div class="form-outline mb-4">
            <input type="text" name="nama" id="form3Example3" class="form-control form-control-lg"
              placeholder="Nama" />
          </div>
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="email" />
          </div>
          <div class="form-outline mb-3">
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Password" />
          </div>
          <div class="form-outline mb-3">
            <input type="password" name="konfirmasi_password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Konfirmasi Password" />
          </div>

          <div class="d-flex justify-content-between align-items-center">

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="register" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Daftar</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Sudah Punya akun? <a href="login_dosen.php"
                class="link-danger">Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-success">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      <!-- Copyright © 2020. All rights reserved. -->
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section>
</body>
</html>