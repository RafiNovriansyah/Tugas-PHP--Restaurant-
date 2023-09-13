<?php 
session_start();
if(!isset($_SESSION['Username'])){
    header("Location:Login.php");
}


?>



<?php
	include "Koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

</head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="">
  <img src="Folder_terima/Italian chef.png" alt="Logo" width="55" height="30" class="d-inline-block align-text-top">
                Italian Restaurant</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="Menu.php">Menu <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Order.php">Order</a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Halaman_Menu.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
      </div>
    </div>

    <div class="row">
        <div class="col">
        <h4>Menu</h4>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nama Menu</th>
      <th scope="col">Harga</th>
      <th scope="col">Tipe Menu</th>
      <th scope="col">Status Menu</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
  <?php
				$query 	= "SELECT * FROM modul_menu";
				$result = mysqli_query($koneksi,$query);
			
				//mengecek apakah ada error ketika menjalankan query
				if(!$result){
					die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
				}

				if(mysqli_num_rows($result) == 0){
						echo '
							<tr>
								<td colspan="5">Tidak Ada Data</td>
							</tr>';
				}else{

					$no = 1;
					while($row = mysqli_fetch_assoc($result)){
                       

                       
					}
				}
			?>
                 
                 <?php
        $sql = "SELECT * FROM modul_menu";
        $no = 1;
        $semua_produk = $koneksi->query($sql);
      while($row = mysqli_fetch_assoc($semua_produk)){
      ?> 
<tr>
                        <th><?php echo $row ["id"] ?></th>
                        <td> <?php echo $row ["Nama_Menu"]; ?></td>
                        <td>Rp.<?= number_format($row ["Harga"],0,",","."); ?></td>
                        <td><?php echo $row["Tipe_Menu"]?></td>
                        <td><?php echo $row["Status_Menu"]?></td>
                        <td>
                        <button id="TersediaBtn" type="button" class="btn btn-primary">Tersedia</button>   <script src="index.js"></script></td> 
                      
                        </tr>

    <?php }?>
  </tbody>
</table>
        </div>
    </div>
    </div>

<script src="bootstrap.min.js"></script>
	<script src="jquery-3.2.1.js"></script>
</body>
</html>