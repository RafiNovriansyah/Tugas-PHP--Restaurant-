<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php		
		if(isset($_GET['id'])){
			include "Koneksi.php";

			$id = $_GET['id']; // id menu

			// cek id menu apakah ada di table menu
			$query_cek = "SELECT * FROM modul_menu WHERE id=".$id;
			$result_cek = mysqli_query($koneksi,$query_cek);

			//mengecek apakah ada error ketika menjalankan query
			if(!$result_cek	){
				die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
			
			// jika query tidak ada yg error
			}else{ 
				// jika data tidak ada
				if(mysqli_num_rows($result_cek) == 0){
					echo "data tidak tersedia";
				}else{
					$data = mysqli_fetch_array($result_cek);
	?>	
					<form action="proses edit.php" method="post">
						<p>
							Id Menu : <input type="text" name="id" value="<?= $data['id'] ?>" readonly>
						</p>
						<p>
							Nama Menu : <input type="text" name="Nama_Menu" value="<?= $data['Nama_Menu']; ?>">
						</p>
						<p>
							Harga : <input type="textarea" name="Harga" value="<?= $data['Harga']; ?>">
						</p>
						
						<table>
						<tr>
							<td>Tipe Menu :</td>
							<td>
							<input type="radio" name="Tipe_Menu" value="Makanan" value="<?= $data['Tipe_Menu']; ?>" required>Makanan
							<input type="radio" name="Tipe_Menu" value="Minuman" value="<?= $data['Tipe_Menu']; ?>" required>Minuman
							</td>
						</tr>
						<tr>
							<td>Status Menu :</td>
							<td>
							<input type="radio" name="Status_Menu" value="Tersedia" value="<?= $data['Gender']; ?>" required>Tersedia
							<input type="radio" name="Status_Menu" value="Tidak Tersedia" value="<?= $data['Gender']; ?>" required>Tidak Tersedia
							</td>
						</tr>
						
						
						</table>
							<input type="submit" name="submit" value="Update">
							<a href="lihat data.php">Kembali</a>
						</p>
					</form>
	<?php
				}
			}
		}else{
			echo 'tidak dapat menampilkan form edit menu <a href="lihat_data.php">klik disini</a> untuk kembali';
		}
	?>
</body>
</html>