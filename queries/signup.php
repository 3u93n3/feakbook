<?php

if(isset($_POST["signSubmit"])){  
    $msg = '';

    $sql = "SELECT * FROM users WHERE userName = :user";     
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":user", $name);
    $name = $_POST['signName'];
    $pass = password_hash($_POST['signPass'], PASSWORD_DEFAULT);

    $stmt->execute();

    if($stmt->rowCount() == 0){
        $_SESSION['user'] = $name;
        $_SESSION['img'] = "img.png";
        $_SESSION['loggedin'] = true;
        $_SESSION['msg'] = "";

        $sql1 = "INSERT INTO users (userName, password) 
        VALUES ('$name', '$pass')";    
        $conn->exec($sql1);
        
        $msg =  "Records inserted successfully.";        

        $sql2 = "SELECT * FROM users WHERE userName = '$name'";
        $stmt1 = $conn->query($sql2);
        while($row = $stmt1->fetch()){            
            $_SESSION['user_id'] = $row['id'];    
        }


        header("Location: profile.php"); //For test
    }else{
        $msg = "This username is already taken.";
    }
}


