<?php
	include "Koneksi.php";



	$query = "DELETE FROM modul_menu WHERE id=".$_GET['id'];
	$result = mysqli_query($koneksi, $query);

	//mengecek apakah ada error ketika menjalankan query
	if(!$result){
		die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
	}else{
		header("Location:lihat data.php");
	}

?>
