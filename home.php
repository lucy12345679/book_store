<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `shopping-cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `shopping-cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
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
   <link rel="stylesheet" href="css/style.css?444">
   <link rel="stylesheet" href="css/st-second.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section id="home-page" class="home">

   <div id="context" class="content">
      <h3>There is no friend as loyal as a book</h3>
      <p>Create your success by reading our books</p>
      <a id="black" href="about.php" class="white-btn">Learn more</a>
   </div>

</section>

<section  id="brown" class="products">

   <h1 class="title">Our popular books</h1>

   <div  id="boc-con"  class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products-book` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form id="card" action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div id="black" class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <input id="red" type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input id="products-img" type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input id="black" type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a id="black" href="shop.php" class="option-btn">load more</a>
   </div>

</section>

<section class="about">

   <div class="flex">



      <div id="card" class="content">
         <h3>Get to now Orchid's bookstore Online</h3>
         <p>No matter what you’re a fan of, from Fiction to Biography, Sci-Fi, Mystery, YA, Manga, and more, Orchid's bookstore has the perfect book for you. Shop bestselling books from the NY Times Bestsellers list, or get personalized recommendations to find something new and unique! Discover kids books for children of all ages including classics like Dr. Seuss to modern favorites like the Dog Man series.</p>
         <a  id="black" href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div  class="content">
      <h3>have any complaints or questions?</h3>
      <p> We are always there to help you!!!</p>
      <a id="black" href="contact.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>