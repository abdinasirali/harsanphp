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
   <link rel="stylesheet" href="css/styles.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <!-- <p> <a href="home.php">home</a> / about </p> -->
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/LOGO.png" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>At Harsan Stationery, we pride ourselves on providing high-quality stationery products for all your needs. Whether you're a student, professional, or artist, we have something for everyone. Our mission is to make sure you have access to the best materials to help you succeed.<br><br>

Located in the heart of the city, we offer a wide range of products from pens and notebooks to office supplies and art materials. We are dedicated to delivering excellent customer service and helping you find exactly what you need.<br><br>

Our Values<br>
Quality Products<br>
Affordable Prices<br>
Excellent Customer Service<br>
A Wide Range of Stationery</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>


<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>