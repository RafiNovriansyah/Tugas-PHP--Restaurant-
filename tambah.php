<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="proses tambah.php" method="POST">
	<table>
   <tr>
    <td>Nama Menu :</td>
    <td><input type="text" name="Nama_Menu" required></td>
   </tr>
   <tr>
    <td>Harga :</td>
    <td><input type="text" name="Harga" required></td>
   </tr>
   <tr>
    <td>Tipe Menu :</td>
    <td>
     <input type="radio" name="Tipe_Menu" value="Makanan" required>Makanan
     <input type="radio" name="Tipe_Menu" value="Minuman" required>Minuman
    </td>
   </tr>
   <tr>
    <td>Status Menu :</td>
    <td>
     <input type="radio" name="Status_Menu" value="Tersedia" required>Tersedia
     <input type="radio" name="Status_Menu" value="Tidak Tersedia" required>Tidak Tersedia
    </td>
   </tr>
   
  </table>
  <p>
			<input type="submit" name="submit" value="Simpan">
			<input type="reset" name="reset">
			<a href="lihat data.php">Kembali</a>
		</p>
	</form>
</body>
</html>
