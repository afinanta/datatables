<?php
    session_start();

    if(!isset($_SESSION["login"])){
      header("Location:login.php");
    }

  require 'functions.php';
  $id = $_GET["id"];

  $qry = "DELETE FROM murid WHERE id =$id";
  mysqli_query ($conn,$qry);

  if(mysqli_affected_rows($conn)){
    echo "<script>alert('Data Berhasil Dihapus');
    document.location.href='halaman.php';
    </script>";
  }else{
    echo "<script>alert ('Data Gagal Di Hapus');
    document.location.href='halaman.php';
    </script>";
  }
?>