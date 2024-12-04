<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/orderlist.css">

</head>
<body id="order-l">
   
<?php include 'header.php'; ?>



<section id="ordersl" class="placed-orders">

   <h1 id="or-h1" class="title">Orders</h1>
   
   <div id="box-con" class="box-container">

      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
     
     <div id="order-img">
     
     </div>
      <div id="order-box" class="box">
         <p id="yellow"> placed on : <span id="oq"><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p id="yellow"> name : <span id="oq" ><?php echo $fetch_orders['name']; ?></span> </p>
         <p id="yellow"> number : <span  id="oq"><?php echo $fetch_orders['number']; ?></span> </p>
         <p id="yellow"> email : <span id="oq">  <?php echo $fetch_orders['email']; ?></span> </p>
         <p id="yellow"> address : <span  id="oq"><?php echo $fetch_orders['address']; ?></span> </p>
         <p id="yellow"> payment method : <span  id="oq"><?php echo $fetch_orders['method']; ?></span> </p>
         <p id="yellow">  orders : <span  id="oq"><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p id="yellow"> total  : <span  id="oq">$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p id="yellow"> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p id="no-order" class="empty">no order is done!</p>';
      }
      ?>
   </div>

</section>










<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>