<?php

session_start();
require "../includes/dbc.php";

try{
    $user = $_SESSION['user'];
    $friend = $_GET['user'];
    $stmt = $conn->query("UPDATE friends SET status = 3 
    WHERE user_one = '$user' AND user_two = '$friend'");
    if($stmt->rowCount() == 0){
        $conn->exec("UPDATE friends SET status = 3 
        WHERE user_two = '$user' AND user_one = '$friend'");
       
    }
    
}catch(PDOException $e){
    $_SESSION['msg'] .=  $e->getMessage() . $e->getFile() . "<br>";
}

header("Location: ../friends.php?status=reject");