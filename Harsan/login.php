<?php
session_start();
include 'config.php'; // Database connection

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    // Check if username exists
    $check_username = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'") or die('Query failed');
    if (mysqli_num_rows($check_username) > 0) {
        $row = mysqli_fetch_assoc($check_username);

        // Check if password matches
        if ($row['password'] === $password) {
            if ($row['user_type'] == 'admin') {
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_username'] = $row['username'];
                $_SESSION['admin_id'] = $row['id'];
                
                header('location:admin_page.php');
            } elseif ($row['user_type'] == 'user') {
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_username'] = $row['username'];
                $_SESSION['user_id'] = $row['id'];
                header('location:home.php');
            }
        } else {
            $message[] = 'Incorrect password!';
        }
    } else {
        $message[] = 'Username does not exist!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="form-container">
    <form action="" method="post">
        <h3>Login Now</h3>
        <input type="text" name="username" placeholder="Enter your username" required class="box">
        <input type="password" name="password" placeholder="Enter your password" required class="box">
        <div class="checkbox-container">
            <input type="checkbox" name="remember_me" id="remember_me">
            <label for="remember_me">Remember Me</label>
        </div>
        <input type="submit" name="submit" value="Login Now" class="btn">
        <input type="reset" value="Reset" class="btn">
        <p><a href="forget_password.php">Forget Password?</a></p>
        <p>Don't have an account? <a href="register.php">Sign Up</a></p>
    </form>
</div>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<p class="error-msg">' . $msg . '</p>';
    }
}
?>

</body>
</html>
