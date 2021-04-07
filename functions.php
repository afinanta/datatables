<?php 

   $conn = mysqli_connect("localhost", "root", "", "siswa");

   function query($query){
       global $conn;
       $result = mysqli_query($conn,$query);
       $rows = [];
       while($row = mysqli_fetch_assoc($result)){
           $rows[] = $row;
       }
       return $rows;
   }

    function tambah($tambah){
        global $conn ; 
        $id = $tambah ["id"];
        $nama = $tambah ["nama"];
        $nis = $tambah ["nis"];
        $jurusan = $tambah ["jurusan"];
        $alamat = $tambah ["alamat"];
        $email = $tambah ["email"];
        
        //upload gambar
        $gambar = upload();
        if( !$gambar ) {
            return false;
        }

        $sql = "INSERT INTO murid VALUE ('$id', '$nama', '$nis', '$jurusan' , '$alamat', '$email', '$gambar ')";
        $result = mysqli_query($conn,$sql);

        return mysqli_affected_rows($conn);
    }


    function upload(){
        $namafile = $_FILES ['gambar']['name'];
        $ukurangambar = $_FILES ['gambar']['size'];
        $error = $_FILES ['gambar']['error'];
        $tmpname = $_FILES ['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang di upload
        if( $error === 4){
            echo "<script>
            alert ('Pilih Gambar Terlebih Dahulu');
            </script>";
            return false;
        }

        //cek apakah yang di upload adalah gambar
        $gambarvalid = ['jpg', 'jpeg', 'png'];
        $ekstensigambar = explode('.', $namafile);
        $ekstensigambar = strtolower(end($ekstensigambar));
        if( !in_array($ekstensigambar, $gambarvalid )){
            echo "<script>
            alert ('Yang Di Upload Bukan Gambar ');
            </script>";
            return false;
        }
         
        //cek jika ukurannya terlalu besar
        if( $ukurangambar > 1000000){
            echo "<script>
            alert ('Ukuran Gambar Terlalu Besar');
            </script>";
            return false;
        }

        //Lolos dari pengecekan, gambar siap di upload
        //generete nama gambar baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensigambar;

        move_uploaded_file ($tmpname, 'img/' . $namafilebaru);
        return $namafilebaru;
    }


    function ubah($ubah){
        global $conn;
        $id = $ubah["id"];
        $nama = $ubah["nama"];
        $nis = $ubah["nis"];
        $jurusan = $ubah["jurusan"];
        $alamat = $ubah["alamat"];
        $email = $ubah["email"];
        $gambarlama = $ubah["gambarlama"];

        //cek apakah user pilha gambar baru apa tidak
        if($_FILES['gambar']['error'] === 4 ){
            $gambar = $gambarlama;
        }else{
            $gambar = upload();
        }

        $sql = "UPDATE murid SET nama='$nama', nis='$nis', jurusan='$jurusan', alamat='$alamat', email='$email', gambar='$gambar' WHERE id=$id";
        mysqli_query($conn,$sql);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword){
        $query = "SELECT * FROM murid 
        WHERE 
        nama LIKE '%$keyword%' OR
        nis LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%' OR
        alamat LIKE '%$keyword%' OR
        email LIKE '%$keyword%'
        ";
        return query($query);
  }

    function daftar($daftar){
        global $conn;

        $username = strtolower(stripcslashes($daftar["username"]));
        $email = strtolower(stripcslashes($daftar["email"]));
        $password = mysqli_real_escape_string($conn, $daftar["password"]);
        $password2 = mysqli_real_escape_string($conn, $daftar["password2"]);

        //cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if(mysqli_fetch_assoc($result)){
            echo "<script>alert ('Username Sudah Terdaftar!!');
            </script>";
            return false;
        }

        //cek konfirmasi password
        if( $password !== $password2 ){
            echo "<script>alert('Konfirmasi Password tidak Sesuai!');</script>";
            return false;
        }
        // enkripsi password 
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        // tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$email', '$password')");

        return mysqli_affected_rows($conn);

    }

?>