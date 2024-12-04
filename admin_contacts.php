<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_contacts.php');
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
   <link rel="stylesheet" href="css/admin-message.css">

</head>
<body id="message-body">
   
<?php include 'admin_header.php'; ?>

<section  id="sec-message" class="messages">

   <h1 id="admin-message" class="title"> messages </h1>

   <div  id="box-con" class="box-container">
   <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
   ?>
   <div id="sec-message" class="box">
      <p id="c-black"> user id : <span id="c-white"><?php echo $fetch_message['user_id']; ?></span> </p>
      <p id="c-black"> name : <span id="c-white"><?php echo $fetch_message['name']; ?></span> </p>
      <p id="c-black"> number : <span id="c-white"><?php echo $fetch_message['number']; ?></span> </p>
      <p id="c-black"> email : <span id="c-white"><?php echo $fetch_message['email']; ?></span> </p>
      <p id="c-black"> message : <span id="c-white"><?php echo $fetch_message['message']; ?></span> </p>
      <a id="black" href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>
   </div>
   <?php
      };
   }else{
      echo '<p id="box-c"  class="empty">no messages  are not sent yet!</p>';
   }
   ?>
   </div>

</section>









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>