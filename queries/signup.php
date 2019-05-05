<?php

$msg = '';

$sql = "SELECT * FROM users WHERE userName = :user";     
$stmt = $conn->prepare($sql);

$stmt->bindParam(":user", $name);
$name = $_POST['signName'];

$stmt->execute();



if($stmt->rowCount() == 0){
    $_SESSION['user'] = $name;
    $_SESSION['img'] = "img.png";

    $sql = "INSERT INTO users (userName, password) 
    VALUES ('$name', '$pass')";    
    $conn->exec($sql);
    
    $msg =  "Records inserted successfully.";        

    header("Location: profileEdit.php"); //For test
}else{
    $msg = "This username is already taken.";
}

