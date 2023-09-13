<?php
include 'Koneksi.php';

if (isset($_POST['order_btn'])) {
  $No_Transaksi =$_POST['$No_Transaksi'];
  $First_Name = $_POST['First_Name'];
  $Last_Name = $_POST['Last_Name'];
  $username = $_POST['Username'];
  $Email = $_POST['Email'];
  $Address = $_POST['Address'];
  $Country = $_POST['Country'];
  $Metode = $_POST['Metode'];
  $Order_Time = $_POST['Order_Time'];
 
    $cart_query = mysqli_query($koneksi, "SELECT * FROM `cart`");
    $price_total = 0;

    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['Name'] . ' (' . $product_item['Quantity'] . ') ';
            $product_price = (int)$product_item['Price'] * (int)$product_item['Quantity'];
            $price_total += (int)$product_price;
        }
    }

    $total_product = implode(', ', $product_name);
    $detail_query = mysqli_query($koneksi, "INSERT INTO `orders` (`No_Transaksi`, `First_Name`, `Last_Name`, `Username`, `Email`, `Address`, `Country`, `Metode`, `Order_Time`, `Total_Products`, `Total_Price`) 
    VALUES ('$No_Transaksi', '$First_Name', '$Last_Name','$username','$Email','$Address', '$Country', '$Metode', '$Order_Time','$total_product','$price_total')") or die('query failed');

    
if ($cart_query && $detail_query) {
    echo "<div class='order-message-container'>
    <div class='message-container'>
        <h3>thank you for shopping!</h3>
        <div class='order-detail'>
            <span>" . $total_product . "</span>
            <span class='total'> total : Rp." . $price_total . "/-  </span>
        </div>
        <div class='customer-details'>
            <p> Your First Name : <span>" . $First_Name . "</span> </p>
            <p> Your Last Name : <span>" . $Last_Name . "</span> </p>
            <p> Your Username : <span>" . $username . "</span> </p>
            <p> Your Email : <span>" . $Email . "</span> </p>
            <p> Your Address : <span>" . $Address . ", " . $Address_2 . ", " . $Country . ", " . $State . ", " . $Zip . "</span> </p>
            <p> Your Payment Mode : <span>" . $Methods . "</span> </p>
           
        </div>
        <a href='products.php' class='btn'>continue shopping</a>
    </div>
    </div>";
}


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
    .position{
        margin-left: -620px;
    }

    .display-order{
   max-width: 50rem;
   background-color: var(--white);
   border-radius: .5rem;
   text-align: center;
   padding:1.5rem;
   margin:0 auto;
   margin-bottom: 2rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
}

.display-order span{
   display: inline-block;
   border-radius: .5rem;
   background-color: var(--bg-color);
   padding:.5rem 1.5rem;
   font-size: 2rem;
   color:var(--black);
   margin:.5rem;
}

.grand-total{
   width: 100%;
   background-color: var(--red);
   color:var(--white);
   padding:1rem;
   margin-top: 1rem;
}
</style>


</head>
<body>
    <!-- NAVBAR -->
    
            <div class="container-fluid">
                
    <div class="row">
      <div class="col">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Halaman_Menu.php">
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
        <a class="nav-link" href="Checkout_Status_Order.php">Checkut Status Order</a>
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

    

    <div class="container">
    <div class="py-5 text-center">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
           
          <?php
         $select_cart = mysqli_query($koneksi, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = (int)$fetch_cart['Price'] * (int)$fetch_cart['Quantity'];
             
            $grand_total += (int)$total_price;
            $grand_total = $total += $total_price;
      ?>
     
      <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?= $fetch_cart['Name']; ?></h6>
                <small class="text-muted"><?= $fetch_cart['Quantity']; ?></small>
              </div>
              <span class="text-muted"><?php  $total_price = (int)$fetch_cart['Price'] * (int)$fetch_cart['Quantity'];
             echo number_format ($total_price);   ?></span>
            </li>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total" > grand total : Rp.<?php echo number_format($grand_total); ?></span>
            
          </ul>

         
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" method="POST" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="First_Name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="Last_Name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" name="Username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="Email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="Address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>


            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" name="Country" required>
                  <option value="">Choose...</option>
                  <option>United States</option>
                  <option>Indonesia</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>

              <div class="col-md-5 mb-3">
                <label for="country">Payment Method</label>
                <select class="custom-select d-block w-100" name="Methods" required>
                  <option value="">Choose...</option>
                  <option value="Paypal">Paypal</option>
                  <option value="Credit Card">Credit Card</option>
                  <option value="Debit Card">Debit Card</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid payment methods.
                </div>
              </div>
            </div>
           

            
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="order_btn" value="Continue to checkout" >Continue to checkout</button>
          </form>
        </div>
      </div>
      </div>
      </div>
            </div>
    


      
<script src="bootstrap.min.js"></script>
	<script src="jquery-3.2.1.js"></script>


</body>
</html>