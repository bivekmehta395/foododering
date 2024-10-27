<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['search_query'])) {
    $search_query = mysqli_real_escape_string($conn, $_POST['search_query']);
    $search_result = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%$search_query%'") or die('query failed');
} else {
    header('location:home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search Results</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<section class="search-results">
    <h1 class="title">Search Results for "<?php echo htmlspecialchars($search_query); ?>"</h1>

    <div class="box-container">
        <?php  
        if (mysqli_num_rows($search_result) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($search_result)) {
        ?>
        <form action="" method="post" class="box">
            <img class="image" src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_product['name']; ?></div>
            <div class="price">RS<?php echo $fetch_product['price']; ?>/-</div>
            <input type="number" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
        </form>
        <?php
            }
        } else {
            echo '<p class="empty">No products found!</p>';
        }
        ?>
    </div>
</section>

<?php include 'footer.php'; ?>

</body>
</html>
