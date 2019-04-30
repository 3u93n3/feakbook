<?php

if(isset($_POST["logSubmit"])){   
    $msg = '';    
        
    $sql = "SELECT * FROM users WHERE userName = :user";     
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":user", $name);

    $name = $_POST['logName'];
    
    $stmt->execute();

    if($stmt->rowCount() == 1){
        while($row = $stmt->fetch()){
            //$msg = $row;
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $row['userName'];            
            $_SESSION['img'] = $row['img_url'];
        }
        
        header("Location: profile.php");
    }else{
        $msg = "No account found with that username.";
    }      
    
    unset($stmt);
    unset($conn);
}

