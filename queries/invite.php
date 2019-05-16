<?php
session_start();
require "../includes/dbc.php";

$user = $_SESSION['user'];
$friend = $_GET['invite'];

try{
    $sql = "INSERT INTO friends (user_one, user_two, status) 
    VALUES('$user', '$friend', 1)";
    $conn->query($sql);
}catch(PDOException $e){
    $_SESSION['msg'] .=  $e->getMessage() . $e->getFile() . "<br>";
}

header("Location: ../friends.php?status=conecting");