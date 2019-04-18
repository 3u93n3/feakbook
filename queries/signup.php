<?php
$msg = '';

try{
    $name = $_POST['signName'];
    $pass = $_POST['signPass'];
    $sql = "INSERT INTO users (userName, password) 
    VALUES ('$name', '$pass')";    
    $conn->exec($sql);
    $msg =  "Records inserted successfully.";
} catch(PDOException $e){
    // die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    $msg = $e->getMessage();
}
