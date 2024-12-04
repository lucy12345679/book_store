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
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?2112121221">
   <link rel="stylesheet" href="css/about.css">
   <link rel="stylesheet" href="css/st-second.css">

</head>
<body>
   
<?php include 'header.php'; ?>



<section id="about-head"  class="about">

   <div class="flex">
   <div class="content">
         <h3>Our founder</h3>
        <p>After living his first 18 years in her land of birth – Samarkand, in Uzbekistan, in 1928, she set off for Khorezm.</p>
<p>Our mission is to provide opportunities to people through knowledge!!!</p>
         <a id="black" href="contact.php" class="btn">Share your thoughts with us.</a>
      </div>


  
      
   </div>

</section>

<section class="reviews">

   <h1 class="title">Who we are ?</h1>

   <div class="box-container">

      <div class="box">
      <img id="orchid" src="images/orchid.jpg" alt="">
<p>Orchid's bookstore is a general bookstore serving Uzbekistan, Khozog'istan, Turkmenistan, Afg'anistan, and Tojikistan. Located in Tashkent, Uzbekistan and its iconic Observatory, our Tojikistan neighborhood is host to many independently owned shops, restaurants, and movie theaters. Our curated selection features the best of literary fiction; graphic novels; children's books; Uzbekistan history and culture; political and social sciences; essays and nonfiction; and books on art, photography, film, and music. We also feature hand-picked magazines and zines, along with a selection of stationery and gifts. Our events program is nationally recognized, and features major touring authors, local favorites, and debuts.</p>
<p>Orchid's bookstore opened November 1, 1996, on the former site of another local bookstore landmark, Chatterton's</p>
      </div>

      
</section>









<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>