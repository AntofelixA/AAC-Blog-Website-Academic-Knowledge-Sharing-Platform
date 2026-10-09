<?php
session_start();
include "db.php";
$login_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT role, roll_no FROM information WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $_SESSION["email"] = $email; // ✅ store email
        header("Location: profile.php");
        exit;
    } else {
        $login_msg = "❌ Invalid email or password.";
    }

    $stmt->close();
}
?>


<!-- HTML remains unchanged, only shows $login_msg -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="login.css"> 
</head>
<body>
  <div class="header">
    <div class="header-logo">
      <img src="Image/abc.png" alt="Logo">
    </div>
    <div class="header-title">Login Page</div>
  </div>

  <div class="login-container">
    <h2 class="login-heading">Login</h2>
    <form class="login-form" method="post" action="">
      <input class="input-email" type="text" name="email" placeholder="Enter your Email" required>
      <input class="input-password" type="password" name="password" placeholder="Enter your password" required>
      <button class="login-button" type="submit">Login</button>
    </form>

    <p style="color:green;"><?php echo $login_msg; ?></p>

    <div class="signup-text">
      Don't have an account? <a class="signup-link" href="signup.php">Sign up</a>
    </div>
  </div>
</body>
</html>
