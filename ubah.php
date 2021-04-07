<?php
      session_start();

      if(!isset($_SESSION["login"])){
        header("Location:login.php");
      }

    require 'functions.php';
    $id =$_GET["id"];
    
    $book = query("SELECT * FROM murid WHERE id=$id"
    )[0];
    if(isset($_POST["submit"])){
        if(ubah($_POST) > 0){
           echo "<script>alert ('Data Berhasil Di Ubah');
            document.location.href='halaman.php';
            </script>";
        }else{
           echo "<script>alert ('Data Gagal Di Ubah');
            document.location.href='halaman.php';
            </script>";
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

    <title>Hello, world!</title>
  </head>
  <body>
  <form action="" method="POST" enctype="multipart/form-data">
  <div class="d-flex justify-content-center">
  <div class="col-sm-3">
  <h2>Ubah Data Buku </h2>
    <input type="hidden" name="id" class="form-control" value="<?= $book ["id"]?>" required>
    <input type="hidden" name="gambarlama" class="form-control" value="<?= $book ["gambar"]?>" required>
  <div class="mb-3">
    <label>Nama Siswa</label>
    <input type="text" name="nama" class="form-control" value="<?= $book ["nama"]?>" required>
  </div>
  <div class="mb-3">
    <label>Nis Siswa</label>
    <input type="text" name="nis" class="form-control" value="<?= $book ["nis"]?>" required>
  </div>
  <div class="mb-3">
    <label>Jurusan</label>
    <input type="text" name="jurusan" class="form-control" value="<?= $book ["jurusan"]?>" required>
  </div>
  <div class="mb-3">
    <label>alamat</label>
    <input type="text" name="alamat" class="form-control" value="<?= $book ["alamat"]?>" required>
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="text" name="email" class="form-control" value="<?= $book ["email"]?>" required>
  </div>
  <div class="mb-3">
      <label>Masukan Gambar</label><br>
        <img src="img/<?= $book["gambar"]?>" width="50px">
       <input type="file" class="form-control" name="gambar">
  </div>
  <button type="button" class="btn btn-outline-danger"><a href="halaman.php">Kembali</a></button>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>