<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit;
}

// Connect to blog database
$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch comments with blog author
$sql = "SELECT c.id, c.comment, c.created_at, u.author
        FROM comments c
        LEFT JOIN userss u ON c.blog_id = u.author
        ORDER BY c.created_at DESC";


$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Comments</title>
<style>
body { font-family: Arial; background: #f4f4f4; padding: 20px; }
.comment-box { background: #fff; padding: 10px 15px; margin-bottom: 10px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
.comment-box small { color: #888; }
</style>
</head>
<body>
<h2>All Comments</h2>
<?php
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment-box'>";
        // Optional: show heading
        if (!empty($row['heading'])) {
            echo "<div><strong>Post:</strong> " . htmlspecialchars($row['heading']) . "</div>";
        }
        echo "<strong>" . htmlspecialchars($row['author']) . "</strong> <small>(" . $row['created_at'] . ")</small><br>";
        echo nl2br(htmlspecialchars($row['comment']));
        echo "</div>";
    }
} else {
    echo "<p>No comments yet.</p>";
}

?>
</body>
</html>
