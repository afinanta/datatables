<?php
  session_start();

  if(!isset($_SESSION["login"])){
    header("Location:login.php");
  }
    require 'functions.php';

  //peginasion
      $jumlahDataPerhalaman = 5;
      $jumlahData = count(query("SELECT * FROM murid"));
      $jumalahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
      $aktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1 ;
      $awaldata = ($jumlahDataPerhalaman * $aktif) - $jumlahDataPerhalaman;

      $siswa = query("SELECT * FROM murid  ORDER BY id DESC  LIMIT $awaldata,$jumlahDataPerhalaman");

      //tombol di cari
      if(isset($_POST["cari"]) ){
        $siswa = cari ($_POST["keyword"]);
      }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
    <style>
    
    </style>
    <title>Halaman Data Siswa</title>
  </head>
  <body>
  <div class="container">
  <div class="row">
    <div class="col-sm-6">
    <button type="button" class="btn btn-light"><a href="tambah.php">Tambah Data Siswa</a></button>
    </div>
    <div class="col-sm-6">
    <p class="text-right"><a href="logut.php">logut</a></p>
    

    <!---search-->
    <div class="row">
    <div class="col-6"></div>
    <div class="col-4">
    <form action="" method="POST">
        <input type="text" name="keyword" size="30" autofocus placeholder="Masukan Keyboard Pencarian"
        autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol">Cari</button>
    </form>
    </div>
    <!--end-->
    </div>
    </div>
    
    <!--table-->
    <h2 class="text-center">Data Siswa Sekolah</h2>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">gambar</th>
            <th scope="col">NIS</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Alamat</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        <?php foreach($siswa as $ssw) : ?>
            <tr>
            <td><?= $i;?></td>
            <td><?=$ssw ["nama"];?></td>
            <td>
            <img src="img/<?= $ssw['gambar']; ?>">
            </td>
            <td><?=$ssw ["nis"];?></td>
            <td><?=$ssw ["jurusan"];?></td>
            <td><?=$ssw ["alamat"];?></td>
            <td><?=$ssw ["email"];?></td>
            <td>
            <a href="ubah.php?id=<?= $ssw["id"];?>">Ubah</a>
            <br>
            <a href="hapus.php?id=<?= $ssw ["id"]; ?>" onclick="return confirm ('Yakin Menghapus Data ini')">Hapus</a>
            </td>
            </tr>
        <?php $i++ ?>
        <?php endforeach ?>
        </tbody>
        </table>
        
        <!--end-->

        <!--Navigasi-->
        <ul class="pagination justify-content-center">
        <?php if($aktif > 1): ?>
        <li class="page-item ">
          <a class="page-link" href="?halaman=<?= $aktif - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <?php endif;?>

        <!--nav-->
        <?php for ( $i = 1; $i <= $jumalahHalaman; $i++ ) :?>
        <?php if( $i == $aktif ) :?>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item"><a class="page-link" href="?halaman=<?= $i;?>" style="font-weight:bold; color:red;"><?= $i ;?></a></li>
            </ul>
          </nav>
          <?php else :?>
            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item"><a class="page-link" href="?halaman=<?= $i;?>"><?= $i ;?></a></li>
            </ul>
          </nav>
          <?php endif ;?>
        <?php endfor ;?>
        <!--end-->
        <?php if($aktif < $jumalahHalaman): ?>
        <li class="page-item">
          <a class="page-link" href="?halaman=<?= $aktif + 1; ?>">Next</a>
        </li>
        </ul>
        <?php endif;?>
        </div>
    <!-- Optional JavaScript -->
    <script src="js/script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>