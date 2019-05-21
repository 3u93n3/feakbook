<?php
session_start();
require "../includes/dbc.php";

try{
    if(isset($_POST["logSubmit"])){
        $_SESSION['msg'] = "";
        
        //Sanitize user data.
        $name = sanitize_input($_POST['logName']);
        $pass = sanitize_input($_POST['logPass']);

        //User query.
        $sql = "SELECT * FROM users WHERE userName = :user";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user', $name);
        $stmt->execute();

        //Check if this name exist
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                //Verify password
                if(password_verify($pass, $row['password'])){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user'] = $row['userName'];      
                    //Check for profile picture.
                    if(empty($row['img_url'])){
                        $_SESSION['img'] = "img.png";
                    }else{
                        $_SESSION['img'] = $row['img_url'];
                    }   

                    header("Location: profile.php");
                }else{
                    $_SESSION['msg'] .= "wrong password";
                }
            }
        }else{
            $_SESSION['msg'] .= "no user with this name";
        }            
    }   
}catch(PDOException $e){
    $_SESSION['msg'] .= $e->getMessage() . $e->getLine() . $e->getCode();
}

unset($stmt);

header("Location: ../index.php");