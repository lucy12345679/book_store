<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/nav.css">

</head>
<body id="body-hom">

<header id="nav" class="header">

   <div id="nav" class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            
         </div>
         <p id="style"> new <a id="qora" href="login.php">login</a> | <a id="qora" href="register.php">register</a> </p>
      </div>
   </div>

   <div  id="black" class="header-2">
      <div id="flexx" class="flex">
   
      <h2 id="change-color" style="color:white;">change backgroung color.</h2>

         <nav  class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="shop.php">shop</a>
            <a href="contact.php">contact</a>
            <a href="orders.php">orders</a>
         </nav>
         <div id="logo-create" class="logo" >
           
         <a id="l-href" href="home.php">Orchid's bookstore</a>
         </div>
         
         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `shopping-cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div id="user-b" class="user-box">
            <div id="user-img">
            
            </div>
           
            <p id="black-color" >username : <span id="c-red"><?php echo $_SESSION['user_name']; ?></span></p>
            <p id="black-color">email : <span id="c-red"><?php echo $_SESSION['user_email']; ?></span></p>
            <a id="log-out" href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>

</header>
<script src="js/main.js"></script>
</body>
</html>