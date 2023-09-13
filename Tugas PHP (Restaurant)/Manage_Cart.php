<?php

session_start();

if ($_SERVER["REQUEST METHOD"]=="POST")
{
    if(isset($_POST['Add_to_cart'])) 
    {
        if(isset($_SESSION['cart']))
        {
            $myitems=array_column($_SESSION['cart'], 'Item_Name');
            if (in_array($_POST['Item_Name'], $myitems))
            {
                echo"<script>alert('Item already added');
                window.location.href='Halaman Menu.php';
                </script>";
            }
            else {
           $count = count($_SESSION['cart']);
           $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'], 'Price'=>$_POST['Price'], 'Quantity'=>1);
           echo"<script>alert('Item already added');
           window.location.href='Halaman Menu.php';
           </script>";
            }
        }
        else 
        {
            $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'], 'Price'=>$_POST['Price'], 'Quantity'=>1);
            echo"<script>alert('Item already added');
                window.location.href='Halaman Menu.php';
                </script>";

        }
    }
}
?>