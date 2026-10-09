<?php
include "db.php";
$login_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT role, roll_no FROM info WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($role, $roll_no);
        $stmt->fetch();
        $login_msg = "✅ Login Successful!<br>Welcome, $role with Roll No: $roll_no";
    } else {
        $login_msg = "❌ Invalid email or password.";
    }

    $stmt->close();
}
?>

<h2>Login Form</h2>
<form method="post" action="">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="submit" value="Login">
</form>
<p style="color:green;"><?php echo $login_msg; ?></p>
