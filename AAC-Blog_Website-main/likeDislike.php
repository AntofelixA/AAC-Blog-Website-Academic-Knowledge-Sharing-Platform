<?php
$conn = new mysqli("localhost", "root", "", "blog");
if ($conn->connect_error) {
    die(json_encode(["success"=>false, "error"=>"DB connection failed"]));
}

$id = intval($_POST['id']);
$type = $_POST['type'];

if(!in_array($type, ['like','dislike'])){
    echo json_encode(["success"=>false, "error"=>"Invalid type"]);
    exit;
}

$column = $type === 'like' ? 'likes' : 'dislikes';
$conn->query("UPDATE approved_blogs SET $column = $column + 1 WHERE id=$id");

$result = $conn->query("SELECT likes, dislikes FROM approved_blogs WHERE id=$id");
$data = $result->fetch_assoc();

echo json_encode([
    "success"=>true,
    "likes"=>$data['likes'],
    "dislikes"=>$data['dislikes']
]);