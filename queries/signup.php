<?php
session_start();
require "../includes/dbc.php";

try{
    if(isset($_POST["signSubmit"])){  
        $_SESSION['msg'] = "";        

        //Sanitize user data.
        $inputName = sanitize_input($_POST['signName']);
        $inputPass = sanitize_input(
            password_hash($_POST['signPass'], PASSWORD_DEFAULT)
        );        
        $inputCode = sanitize_input($_POST['enterCode']);
        $formOk = 0;

        //User query.        
        $sql = "SELECT * FROM users WHERE userName = :user";     
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":user", $name);
        $name = $inputName;        

        $stmt->execute();

        //Check user name is free.
        if($stmt->rowCount() !== 0){
            $formOk += 1;
            $_SESSION['msg'] .= "This username is already taken.";
            exit(header("Location: ../index.php"));    
        }
        
        //Code query.        
        $sql2 = "SELECT * FROM codes WHERE code = :code";     
        $stmt = $conn->prepare($sql2);

        $stmt->bindParam(":code", $code);
        $code = $inputCode;
    
        $stmt->execute();

        //Check code is it in the list
        if($stmt->rowCount() > 0){
            //Delete code from the list. 
            $conn->exec("DELETE FROM codes WHERE code = '$code'");
        }else{
            $formOk += 1;
            $_SESSION['msg'] .= "Wrong code";
            exit(header("Location: ../index.php"));
        }

        if($formOk == 0){
            //Insert name and password in DB.
            $sql1 = "INSERT INTO users (userName, password) VALUES(:name, :pass)";
            $stmt = $conn->prepare($sql1);
            $stmt->bindParam(':name', $inputName);
            $stmt->bindParam(':pass', $inputPass);
            $stmt->execute(); 

            $_SESSION['user'] = $inputName;
            $_SESSION['img'] = "img.png";
            $_SESSION['loggedin'] = true; 

            header("Location: profile.php");
        }
    }    
}catch(PDOException $e){
    $_SESSION['msg'] .= "<br>" . $e->getMessage() . "<br>" . $e->getTraceAsString(); 
}

unset($stmt);

header("Location: ../index.php");