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
   <title>messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="stylesheet" href="css/admin-header.css">

</head>
<body>
<header id="red" class="header">

   <div class="flex">

      

      <nav id="nav" class="navbar">
         <a href="admin_page.php">home</a>
         <a href="admin_products.php">books</a>
         <a href="admin_orders.php">orders</a>
         <a href="admin_users.php">users</a>
         <a href="admin_contacts.php">messages</a>
      </nav>
      <a id="admin" href="admin_page.php" class="logo">Admin<span id="control">Control</span></a>
      <div class="icons">
         <div id="menu-btn"  class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div id="account-b" class="account-box">
        
         <p id="c-white" >username : <span id="green"><?php echo $_SESSION['admin_name']; ?></span></p>
         <p id="c-white">email : <span id="green"><?php echo $_SESSION['admin_email']; ?></span></p>
         <a  href="logout.php" class="delete-btn">logout</a>
        
         <div id="c-white">new <a id="c-red" href="login.php">login</a> | <a id="c-red" href="register.php">register</a></div>
      </div>

   </div>

</header>
</body>
</html>