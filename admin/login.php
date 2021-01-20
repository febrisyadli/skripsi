<?php
require 'config.php';
if (isset($_SESSION['has_login_admin']) && isset($_SESSION['admin_id'])) {
  header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cek = $db->query("select * from tb_admin where email='".$email."'")->fetch();
  if ($cek) {
    if (password_verify($password, $cek->password)) {
      if ($cek->is_active == 1) {
        $_SESSION['has_login_admin'] = true;
        $_SESSION['admin_id'] = $cek->admin_id;
        $_SESSION['email'] = $cek->email;
        $_SESSION['nama'] = $cek->nama_lengkap;
        $_SESSION['foto'] = $cek->foto;
        $_SESSION['created_at'] = $cek->created_at;
        header('location: index.php');
      } else {
        echo "akun nonaktif";
      }
    } else {
      echo "password salah";
    }
  } else {
    echo "email yang anda masukkan salah / tidak terdaftar";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Hj. Humairoh</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
  <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Silahkan Login</h3>
          </div>
          <div class="panel-body">
            <form action="" method="POST" role="form">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="E-mail" name="email" type="email" name="email" autocomplete="off" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Password" name="password" type="password" name="password" autocomplete="new-password">
                </div>
                <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Remember Me"> Ingatkan saya
                  </label>
                </div>
                <button type="submit" class="btn btn-success btn-block">Login</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/vendor/metisMenu/metisMenu.min.js"></script>
  <script src="assets/dist/js/sb-admin-2.js"></script>
</body>

</html>