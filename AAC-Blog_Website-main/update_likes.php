<?php
include 'db.php';

$id = (int)$_GET['id'];
$type = $_GET['type'];

if($type === "like"){
    $conn->query("UPDATE approved_blogs SET likes = likes + 1 WHERE id=$id");
    $res = $conn->query("SELECT likes FROM approved_blogs WHERE id=$id");
    echo $res->fetch_assoc()['likes'];
} elseif($type === "dislike"){
    $conn->query("UPDATE approved_blogs SET dislikes = dislikes + 1 WHERE id=$id");
    $res = $conn->query("SELECT dislikes FROM approved_blogs WHERE id=$id");
    echo $res->fetch_assoc()['dislikes'];
}