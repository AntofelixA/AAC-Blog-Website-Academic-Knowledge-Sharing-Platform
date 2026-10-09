<?php
session_start();
if (!isset($_SESSION["email"])) {
    echo json_encode(["error" => "Not logged in"]);
    exit;
}

include "db.php";

$email = $_SESSION["email"];
$sql = "SELECT email, roll_no, role FROM information WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["error" => "User not found"]);
}
?>
