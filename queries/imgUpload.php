<?php

if(!empty($_FILES['imgUpload'])){
    

    $sqlChange = "UPDATE users SET img_url = :img_url WHERE userName = :name";
    $stmt = $conn->prepare($sqlChange);

    $stmt->bindParam(":img_url", $img_url);
    $stmt->bindParam(":name", $name);
    
    $img_name = uniqid() . $_FILES['imgUpload']['name'];
    $img_url = "uploads/" . $img_name;    
    $img = $_SESSION['img'] = $img_url;
    $name = $_SESSION['user'];

    $stmt->execute();    

    // unlink($_SESSION['img']);

    move_uploaded_file($_FILES['imgUpload']['tmp_name'], $img_url);
    
    

    echo "<pre>";
    print_r($_FILES['imgUpload']);
    print_r($_POST);    
    echo "</pre>";
}