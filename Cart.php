<?php

include 'Koneksi.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($koneksi, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:Cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($koneksi, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:Cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($koneksi, "DELETE FROM `cart`");
   header('location:Cart.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

   <style>
      .card-img-top{
         height : 25vh;
         object-fit: cover ;
         /*         width: auto;*/
         /*         max-height: 36rem;*/
         /*         border-radius: calc(.25rem - 1px);*/
         /*      } */
      }
   </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Halaman_Menu.php ">
  <img src="Folder_terima/Italian chef.png" alt="Logo" width="55" height="30" class="d-inline-block align-text-top">
                Italian Restaurant</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Menu <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Checkout status order.php">Checkut Status Order</a>
      </li>
      <li class="nav-item dropdown"></li>
      <a class="nav-link" href="#">Link</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
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

    <div class="row">
    <table class="table table-striped">

<thead>
   
   <th>Price</th>
   <th>Option</th>
   
</thead>

<tbody>

   <?php 
   
   $select_cart = mysqli_query($koneksi, "SELECT * FROM `cart`");
   $grand_total = 0;
   if(mysqli_num_rows($select_cart) > 0){
      while($fetch_cart = mysqli_fetch_assoc($select_cart)){
   ?>

    <form action="" method="POST">
     <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $fetch_cart['Image']; ?>" alt="">
  <div class="card-body">
    <h5 class="card-title"><?php echo $fetch_cart['Name']; ?></h5>
    <p class="price">Rp.<?php echo number_format($fetch_cart['Price']); ?>/-</p>
    <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['Id']; ?>" >
            <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['Quantity']; ?>" >
            <input type="submit" value="update" name="update_update_btn">
    </form>

      
      <?php $sub_total = (int)$fetch_cart['Price'] * (int)$fetch_cart['Quantity'] ?>
      <td>Rp.<?php echo number_format($sub_total); 
       $grand_total += (int)$sub_total;  ?>/-</td>
       <td scope="col"><a href="Cart.php?remove=<?php echo $fetch_cart['Id']; ?>" onclick="return confirm('remove item from cart?')" class="btn btn-warning btn-sm"> <i class="fas fa-trash"></i> remove</a></td>
     
      
   </tr>
   <?php
      };
   };
   ?>
  
    

    
    
        <td scope="col"><h5>Total Price</h5></td>
        <td scope="col"><h5>Rp.<?php echo number_format($grand_total); ?>/-</h5></td>
        <td scope="col"><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="btn btn-danger"> <i class="fas fa-trash"></i> delete all </a></td>
        <td scope="col"><a href="Checkout.php" class="btn btn-success <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a></td>
        <td scope="col"> <a href="Halaman_Menu.php" class="btn btn-primary btn-lg" style="margin-top: 0;">continue shopping</a></td>
      
     </tbody>
</table>



</table>
    </div>
</div>


    <script src="bootstrap.min.js"></script>
	<script src="jquery-3.2.1.js"></script>
</body>
</html>