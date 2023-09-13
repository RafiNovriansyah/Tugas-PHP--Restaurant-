<?php
  $hosting = "localhost";  // alamat server
  $username = "root"; // username database
  $password = ""; // password database
  $nama_data = "user_akun"; //nama database
  
  $conn = mysqli_connect($hosting,$username,$password,$nama_data); //pastikan urutan nya seperti ini, jangan tertukar

  if(!$conn){ //jika tidak terkoneksi maka akan tampil error
    die ("Koneksi dengan database gagal: ".mysqli_connect_error());
  }

  if(isset($_POST['Username'])){

    $Username_Id		= $_POST['Username'];
    $Password_Id           = $_POST['Password'];
    
    
    $query = "INSERT INTO `user` (`Username`,`Password`) VALUES('$Username_Id','$Password_Id')";
    $result = mysqli_query($conn, $query);

    //mengecek apakah ada error ketika menjalankan query
    if(!$result){
        die ("Query Error: ".mysqli_errno($conn)." - ".mysqli_error($conn));
    }else{
        // apabila tambah data berhasil, maka redirect ke halaman lihat_data.php
        header("Location:Halaman_Menu.php");
    }

// jika ga ada maka tampilkan pesan dibawah ini
}else{
    echo "form tambah biodata harus di isi";
}	
?>


