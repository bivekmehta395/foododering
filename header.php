<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">
   <div class="header-2">
      <div class="flex">
         <!-- Logo -->
         <a href="home.php" class="logo">ONLINE FOOD ORDER</a>

         <!-- Navbar links -->
         <nav class="navbar">
            <a href="home.php">Hom</a>
            <a href="about.php">About</a>
            <a href="shop.php">Shop</a>
            <a href="orders.php">Orders</a>
            <a href="logout.php">Logout</a>
         </nav>

         <!-- Search bar -->
         <form action="search.php" method="POST" class="search-bar">
            <input type="text" name="search_query" placeholder="Search for products..." required>
            <button type="submit" class="btn"><i class="fas fa-search"></i></button>
         </form>

         <!-- Icons for cart and menu -->
         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>

            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>
      </div>
   </div>
</header>
