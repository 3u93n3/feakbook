<?php

if(!empty($_SESSION['img']) ){
    if($_SESSION['img'] != "img.png"){
        unlink($_SESSION['img']); 
    }
}

// print_r($_SESSION['img']);
// echo $_SESSION['img'] == "img.png";

$sqlChange = "UPDATE users SET img_url = :img_url WHERE userName = :name";
$stmt = $conn->prepare($sqlChange);

$stmt->bindParam(":img_url", $img_url);
$stmt->bindParam(":name", $name);

$img_extension = explode(".", $_FILES['imgUpload']['name']);
$img_name = uniqid() . "." . end($img_extension);
$img_url = "uploads/" . $img_name;    
$img = $_SESSION['img'] = $img_url;
$name = $_SESSION['user'];

$stmt->execute();    

move_uploaded_file($_FILES['imgUpload']['tmp_name'], $img_url);

// echo "<pre>";
// print_r($_FILES['imgUpload']);
// print_r($_POST);    
// echo "</pre>";
