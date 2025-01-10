<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin header</title>
   <link rel="stylesheet" href="css/style_admin.css">
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="stylesheet" href="css/sidebar.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



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
   <div class="flex">

      <!-- Sidebar -->
      <aside class="sidebar">
    <div class="admin-profile">
        <?php if (isset($_SESSION['admin_id'])): ?>
            <?php
            $admin_id = $_SESSION['admin_id'];
            $query = mysqli_query($conn, "SELECT profile_picture, username FROM users WHERE id = '$admin_id'");
            $row = mysqli_fetch_assoc($query);
            ?>
            <img src="uploaded_pics/<?php echo $row['profile_picture']; ?>" alt="Admin Picture" class="sidebar-profile-img">
            <p class="admin-name"><?php echo $row['username']; ?></p>
        <?php endif; ?>
    </div>
    <nav class="navbar">
    <a href="admin_page.php"><i class="fas fa-home"></i> Home</a>
    <a href="admin_products.php"><i class="fas fa-box"></i> Products</a>
    <a href="admin_orders.php"><i class="fas fa-shopping-cart"></i> Orders</a>
    <a href="admin_users.php"><i class="fas fa-users"></i> Users</a>
    <a href="admin_contacts.php"><i class="fas fa-envelope"></i> Messages</a>
    <a href="logout.php" class="delete-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
</nav>

</aside>

      <!-- Main Content -->
      <div class="main-content">
         <div class="icons">
         <p>Harsan Stationery</p>
         </div>


      </div>

   </div>
</header>

</body>
</html>