<?php
	include "Koneksi.php";
session_start();
session_destroy();

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($koneksi, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($koneksi, "INSERT INTO `cart`(Name, Price, Image, Quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="Assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <style>
    main {
      display: flex;
      flex-wrap: wrap;
      max-width: 1500px;
      width: 95%;
      margin: 40px auto;
      justify-content: space-between;
      margin: auto;

    }
  </style>
</head>
<body>

<!-- NAVBAR -->

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
        <a class="nav-link" href="Checkout_Status_Order.php">Checkut Status Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Cart.php">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Login.php">Login</a>
      </li>
    </ul>
  </div>
</nav>
      </div>
    </div>
    
    <!-- CAROUSEL -->
    <div class="container">
      <div class="row">
      <div class="col-12">
      <div class="jumbotron jumbotron-fluid" >
  <div class="container">
    <h1 class="display-4"> È finita a tarallucci e vino.</h1>
    <p class="lead"> “It ended with tarallucci and wine”.</p>
  </div>
</div>
      </div>
      </div>

      <!-- CARD -->
     <main>
      <?php
        $sql = "SELECT * FROM modul_menu";
        $semua_produk = $koneksi->query($sql);
      while($row = mysqli_fetch_assoc($semua_produk)){
      ?> 

     <form action="" method="POST">
     <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $row ["Foto_Menu"]; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row ["Nama_Menu"]; ?></h5>
    <p class="price">Rp.<?= number_format($row ["Harga"]); ?></p>
    <input type="hidden" name="product_name" value="<?php echo $row['Nama_Menu']; ?>">
    <input type="hidden" name="product_price" value="<?php echo $row['Harga']; ?>">
    <input type="hidden" name="product_image" value="<?php echo (string)$row['Foto_Menu']; ?>">

    <?php
            // Tambahkan logika berdasarkan status menu
            $status_menu = $row["Status_Menu"];
            $button_class = ($status_menu == 'Tersedia') ? 'btn-success' : 'btn-danger';

            echo '<button type="button" class="btn ' . $button_class . '">' . $status_menu . '</button>';
            ?>

            <input type="submit" class="btn btn-primary" value="add to cart" name="add_to_cart">
        </div>
    </div>
     </form>

<?php 
      }
?>
     </main>
    </div>

  </div>









	<script src="bootstrap.min.js"></script>
	<script src="jquery-3.2.1.js"></script>
</body>
</html>