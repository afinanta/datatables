<?php 
    require 'functions.php';
    if(isset($_POST["submit"])){
        if(daftar($_POST) > 0){
            echo "<script>alert ('Terima Kasih Telah Registrasi');
            document.location.href='login.php';
            </script>";
        }else{
            echo mysqli_error($conn);
        }
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

    <title>Registrasi</title>
  </head>
  <body>
  <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Please <span class="font-weight-bold text-primary">REGISTRASI</span></h5></div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                  <input type="Email" name="email" class="form-control" placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                </div><div class="form-group">
                  <input type="password" name="password2" class="form-control" placeholder="Confirm Password" autocomplete="off">
                </div>
                <div class="form-group">
                  <button type="submit" name="" class="btn btn-light btn-block"><a href="login.php">Kembali</a></button>
                  <br>
                  <input type="submit" name="submit" value="Registrasi" class="btn btn-primary btn-block">
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