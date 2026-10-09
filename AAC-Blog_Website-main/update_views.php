<?php
include 'db.php';

header('Content-Type: application/json');

$response = ["success" => false, "views" => 0];

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conn->query("UPDATE approved_blogs SET views = views + 1 WHERE id=$id");
    $res = $conn->query("SELECT views FROM approved_blogs WHERE id=$id");
    if ($res && $row = $res->fetch_assoc()) {
        $response["success"] = true;
        $response["views"] = (int)$row['views'];
    }
}

echo json_encode($response);