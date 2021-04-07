<?php
  session_start();
  require 'functions.php';

  if( isset($_COOKIE["id"]) && isset($_COOKIE["key"]) ){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];
  
    //ambil username berdasarkan ID
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie berdasarkan username
    if($key === hash('sha256', $row['username'])){
      $_SESSION['login'] = true;
    }
  }

  if(isset($_SESSION["login"])){
    header ("Location: halaman.php");
    exit;
  }
  if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){

      //cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["password"])){
        // set session
        $_SESSION["login"] = true;
        //cek rumember me
        if(isset($_POST["check"])){
        //buat cookie
        setcookie('id', $row ['id'], time() + 60);
        setcookie( 'key', hash('sha256', $row['username']));
        }
        header("Location: halaman.php");
        exit;
      }
    }
    $error = true;
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>LOGIN</title>
  </head>
  <body>
  <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Please <span class="font-weight-bold text-primary">LOGIN</span></h5></div>
            <div class="card-body">
            <?php if(isset($error)):?>
              <div class="alert alert-danger" role="alert">
                Username/Password Anda Masukan Salah!!
              </div>
            <?php endif;?>
              <form action="" method="POST">
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                </div>
                <div class="form-group custom-control custom-checkbox">
                  <input type="checkbox" name="check" class="custom-control-input" id="customControlAutosizing">
                  <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                </div>
                <div class="form-group">
                <button type="submit" name="" class="btn btn-light btn-block"><a href="registrasi.php">Registrasi</a></button>
                  <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>