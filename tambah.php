<?php 
      session_start();

      if(!isset($_SESSION["login"])){
        header("Location:login.php");
      }

    require 'functions.php';
    if(isset($_POST["submit"])){

        if(tambah($_POST) > 0){
            echo "<script>alert('databerhasil di simpan');
            document.location.href='halaman.php';
            </script>";
        }else{
            echo "<script>alert('gagal di simpan');
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
    <style>
        body{
            background: url(senja.jpg);
            background-size : cover;
            background-attachment: fixed;

            @media (max-width: 767.98px) { ... }
        }
    </style>
    <title>Hello, world!</title>
  </head>
  <body>
    
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-center">
                <div class="col-sm-5">
                        <h1 class="text-center">Tambah Data Siswa</h1>
        <div class="mb-3">
            <la="">ID Siswa</label>
            <input type="text" class="form-control" name="id" required autocomplete="off">
        </div>
        <div class="mb-3p">
            <labe">Nama Siswa</label>
            <input type="text" class="form-control" name="nama" required autocomplete="off">
        </div>
        <div class="mb-3">
            <labe">Nisn Siswa</label>
            <input type="text" class="form-control" name="nis" required autocomplete="off">
        </div>
        <div class="mb-3">
            <lr="">Jurusan</label>
            <input type="text" class="form-control" name="jurusan" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Alamat siswa</label>
            <input type="text" class="form-control" name="alamat" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Email Siswa</label>
            <input type="email" class="form-control" name="email" required autocomplete="off">
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" class="form-control" name="gambar" width:100px; height:100px;>
        </div>
        <button type="button" class="btn btn-warning"><a href="halaman.php">Kembali</a></button>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>