<?php
// require "includes/dbc.php";

$_SESSION['msg'] = "";

try{
    if(isset($_POST["signSubmit"])){  
        $msg = '';

        //Check code it is in the list
        $sql2 = "SELECT * FROM codes WHERE code = :code";     
        $stmt = $conn->prepare($sql2);

        $stmt->bindParam(":code", $code);
        $code = $_POST['enterCode'];
        $stmt->execute();

        if($stmt->rowCount() > 0){
            //Check user name is free
            $sql = "SELECT * FROM users WHERE userName = :user";     
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(":user", $name);
            $name = $_POST['signName'];
            $pass = $_POST['signPass'];
            

            $stmt->execute();

            if($stmt->rowCount() == 0){
                $_SESSION['user'] = $name;
                $_SESSION['img'] = "img.png";
                $_SESSION['loggedin'] = true;

                //Insert name and password in DB
                $sql1 = "INSERT INTO users (userName, password) VALUES(:name, :pass)";
                $stmt = $conn->prepare($sql1);
                $stmt->bindParam(':name', $_POST['signName']);
                $stmt->bindParam(':pass', password_hash($_POST['signPass'], PASSWORD_DEFAULT));
                $stmt->execute();         
                
                //Delete code from the list                
                $conn->exec("DELETE FROM codes WHERE code = '$code'");

                header("Location: profile.php");
            }else{
                $_SESSION['msg'] .= "This username is already taken.";
            }

            

        }else{
            $_SESSION['msg'] .= "Wrong code";
        }

        
    }    
}catch(PDOException $e){
    $_SESSION['msg'] .= "<br>" . $e->getMessage() . "<br>" . $e->getTraceAsString(); 
}


unset($stmt);