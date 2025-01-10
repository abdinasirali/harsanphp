<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="css/style_user.css">
   <link rel="stylesheet" href="css/styles.css">
   

</head>
<body>
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

<header class="header">



   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">Harsan Stationery</a>

         <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="shop.php">shop</a>
            <a href="contact.php">contact</a>
            <a href="orders.php">orders</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
           
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
  
    <?php if (isset($_SESSION['user_id'])): ?>
        <?php
        // Hel user_id si loo soo saaro sawirka
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($conn, "SELECT profile_picture FROM users WHERE id = '$user_id'");
        $row = mysqli_fetch_assoc($query);
        ?>
        <img src="uploaded_pics/<?php echo $row['profile_picture']; ?>" alt="User Profile Picture" class="profile-img">
    <?php endif; ?><br>
    <p> <span><?php echo $_SESSION['user_username']; ?></span></p><br>
    <a href="logout.php" class="delete-btn">Logout</a>
</div>

      </div>
   </div>

</header>
</body>
</html>