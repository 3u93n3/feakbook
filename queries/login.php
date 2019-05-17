<?php

$_SESSION['msg'] = "";

try{
    if(isset($_POST["logSubmit"])){
        $name = $_POST['logName'];
        $pass = $_POST['logPass'];

        $sql = "SELECT * FROM users WHERE userName = :user";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user', $name);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                if(password_verify($pass, $row['password'])){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user'] = $row['userName'];      
                    $_SESSION['user_id'] = $row['id'];      
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
