<?php
include 'db_blog.php'; // Make sure db_blog.php connects to database 'blog'

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $content = $_POST['content'] ?? '';

    if ($title && $author && $content) {
        // Insert into blog table (change 'info' to the correct table name for blogs)
        $stmt = $blog_conn->prepare("INSERT INTO blog (title, author, content, submitted_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("sss", $title, $author, $content);

        if ($stmt->execute()) {
            echo "✅ Blog successfully stored.";
        } else {
            echo "❌ Failed to insert blog: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "❌ Missing required fields.";
    }

    $blog_conn->close();
}
?>
