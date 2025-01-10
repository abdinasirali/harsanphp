<?php

include 'config.php';

if(isset($_POST['submit'])){

   $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
   $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
   $sex = mysqli_real_escape_string($conn, $_POST['sex']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
   $user_status = mysqli_real_escape_string($conn, $_POST['user_status']);
   
   // Handle profile picture upload
   $profile_picture = $_FILES['profile_picture']['name'];
   $profile_picture_tmp_name = $_FILES['profile_picture']['tmp_name'];
   $profile_picture_folder = 'uploaded_pics/'.$profile_picture;

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'User already exists!';
   }else{
      if(move_uploaded_file($profile_picture_tmp_name, $profile_picture_folder)){
         mysqli_query($conn, "INSERT INTO `users`(first_name, last_name, sex, username, password, phone, email, profile_picture, user_type, user_status) VALUES('$first_name', '$last_name', '$sex', '$username', '$password', '$phone', '$email', '$profile_picture', '$user_type', '$user_status')") or die('query failed');
         $message[] = 'Registered successfully!';
         header('location:login.php');
      }else{
         $message[] = 'Failed to upload profile picture!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Registration</title>
   <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span></div>';
   }
}
?>

<div class="form-container">
   <form action="" method="post" enctype="multipart/form-data">
      <h3>Register Now</h3>
      <input type="text" name="first_name" placeholder="First Name" required class="box">
      <input type="text" name="last_name" placeholder="Last Name" required class="box">
      <select name="sex" required class="box">
         <option value="Male">Male</option>
         <option value="Female">Female</option>
      </select>
      <input type="text" name="username" placeholder="Username" required class="box">
      <input type="password" name="password" placeholder="Password" required class="box">
      <input type="text" name="phone" placeholder="Phone" required class="box">
      <input type="email" name="email" placeholder="Email" required class="box">
      <input type="file" name="profile_picture" required class="box">
      <select name="user_type" required class="box">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      <select name="user_status" required class="box">
         <option value="active">Active</option>
         <option value="not_active">Not Active</option>
      </select>
      <input type="submit" name="submit" value="Register Now" class="btn">
      <input type="reset" value="Reset" class="btn">
      <p>Already have an account? <a href="login.php">Login Now</a></p>
   </form>
</div>

</body>
</html>
