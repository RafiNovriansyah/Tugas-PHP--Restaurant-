<?php
  $hosting = "localhost";  // alamat server
  $username = "root"; // username database
  $password = ""; // password database
  $nama_data = "user_akun"; //nama database
  
  $conn = mysqli_connect($hosting,$username,$password,$nama_data); //pastikan urutan nya seperti ini, jangan tertukar

  if(!$conn){ //jika tidak terkoneksi maka akan tampil error
    die ("Koneksi dengan database gagal: ".mysqli_connect_error());
  }

  if(isset($_POST["Username"])){

    $Data_Username = "Shawn@gmail.com";
    $Data_Password = "456";

    $Username = $_POST["Username"];
    $Password = $_POST["Password"];


    if ($Username == $Data_Username && $Password == $Data_Password){
        // berhasil login
        session_start();
        $_SESSION["Username"] = $Username;
        header("location:Menu.php");
    }else{
        // gagal login
        echo "login gagal. Username atau Password salah";
    }

  }else {
    echo "Form login harus diisi";
  }

  ?>