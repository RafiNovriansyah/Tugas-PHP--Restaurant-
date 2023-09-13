<?php
	
	// di cek apakah ada data post dengan nama index nya "nama"
	if(isset($_POST['Nama_Menu'])){
		include "Koneksi.php";

		$Nama_Menu		= $_POST['Nama_Menu'];
		$Harga            = $_POST['Harga'];
		$Tipe_Menu	            = $_POST['Tipe_Menu'];
		$Status_Menu            = $_POST['Status_Menu'];
		

		$query = "INSERT INTO `modul_menu` (`Nama_Menu`,`Harga`,`Tipe_Menu`,`Status_Menu`) VALUES('$Nama_Menu','$Harga', '$Tipe_Menu', '$Status_Menu')";
		$result = mysqli_query($koneksi, $query);

		//mengecek apakah ada error ketika menjalankan query
		if(!$result){
			die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
		}else{
			// apabila tambah data berhasil, maka redirect ke halaman lihat_data.php
			header("Location:lihat data.php");
		}

	// jika ga ada maka tampilkan pesan dibawah ini
	}else{
		echo "form tambah biodata harus di isi";
	}	

?>
