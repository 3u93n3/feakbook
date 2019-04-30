<?php

if(isset($_POST["signSubmit"])){  
    $msg = '';

    $sql = "SELECT * FROM users WHERE userName = :user";     
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":user", $name);

    $name = $_POST['signName'];

    $stmt->execute();

    $_SESSION['user'] = $name;
    $_SESSION['img'] = "img.png";

    if($stmt->rowCount() == 0){
        $sql = "INSERT INTO users (userName, password) 
        VALUES ('$name', '$pass')";    
        $conn->exec($sql);
        $msg =  "Records inserted successfully.";        

        header("Location: profile.php");
    }else{
        $msg = "This username is already taken.";
    }
}