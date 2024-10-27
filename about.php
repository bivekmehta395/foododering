
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

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
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
   <title>about us</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis non odit nihil, doloremque sunt aut placeat culpa. Adipisci minima, neque necessitatibus incidunt nemo eveniet mollitia quis facere vel consectetur culpa?</p>
         <a href="menu.html" class="btn">our menu</a>
      </div>

   </div>

</section>

<section class="steps">

   <h1 class="title">3 simple steps</h1>

   <div class="box-container" style="box-sizing: 10%;display: flex;/*! display: -webkit-inline-box; */width: 10%;padding: 10%;">
      <div class="box">
         <img src="images/step-1.png" alt=""   style="width:40rem">
         <h3>select food</h3>
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, hic.</p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt=""style="width:40rem">
         <h3>30 minutes delivery</h3>
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, hic.</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt=""style="width:40rem">
         <h3>enjoy food!</h3>
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, hic.</p>
      </div>

   </div>

</section>


<?php include 'footer.php'; ?>























<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>



</body>
</html>