<?php

	if(isset($_POST['id'])){
		include "Koneksi.php";

		$id					= $_POST['id'];
		$Nama_Menu		= $_POST['Nama_Menu'];
		$Harga            = $_POST['Harga'];
		$Tipe_Menu            = $_POST['Tipe_Menu'];
		$Status_Menu          = $_POST['Status_Menu'];
		

		$query = "UPDATE modul_menu SET `Nama_Menu`='$Nama_Menu', `Harga`='$Harga', `Tipe_Menu`='$Tipe_Menu', `Status_Menu`='$Status_Menu' WHERE `id`='$id'";
		$result = mysqli_query($koneksi, $query);

		//mengecek apakah ada error ketika menjalankan query
		if(!$result){
			die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
		}else{
			// apabila edit data berhasil, maka redirect ke halaman lihat_data.php
			header("Location:lihat data.php"); 
		}

	}else{
		echo "form edit biodata harus di isi";
	}	

?>