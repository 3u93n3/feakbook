<?php

$_SESSION['msg'] = "";
try{
    if(isset($_POST["logSubmit"])){  
        $msg = '';    
            
        $sql = "SELECT * FROM users WHERE userName = :user AND password = :pass";     
        $stmt = $conn->prepare($sql);
    
        $stmt->bindParam(":user", $name);
        $stmt->bindParam(":pass", $pass);
    
        $name = $_POST['logName'];
        $pass = $_POST['logPass']; //password_verify($_POST['logPass']);
    
        $stmt->execute();

        while($row = $stmt->fetch()){
            if($name == $row['userName'] && password_verify($pass, $row['password']) ){
                $_SESSION['loggedin'] = true;
                // $_SESSION['msg'] = "";
                $_SESSION['user'] = $row['userName'];      
                $_SESSION['user_id'] = $row['id'];      
                if(empty($row['img_url'])){
                    $_SESSION['img'] = "img.png";
                }else{
                    $_SESSION['img'] = $row['img_url'];
                }   

                header("Location: profile.php");
            }else{
                $_SESSION['msg'] = "No account found with that username.";
            }   
        }
    
        // if($stmt->rowCount() == 1){
        //     while($row = $stmt->fetch()){
        //         //$msg = $row;
        //         $_SESSION['loggedin'] = true;
        //         $_SESSION['msg'] = "";
        //         $_SESSION['user'] = $row['userName'];      
        //         $_SESSION['user_id'] = $row['id'];      
        //         if(empty($row['img_url'])){
        //             $_SESSION['img'] = "img.png";
        //         }else{
        //             $_SESSION['img'] = $row['img_url'];
        //         }   
                
        //     }
            
        //     header("Location: profile.php");
        // }else{
        //     $msg = "No account found with that username.";
        // }      
    }
}catch(PDOException $e){
    $_SESSION['msg'] .= $e->getMessage() . $e->getLine() . $e->getCode();
}


