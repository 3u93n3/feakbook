<?php

echo <<<SIGNUP
    <form action="index.php" method="post">
        <fieldset>
            <legend>Sign Up</legend>
            
            <input type="text" name="signName" id="signName"  class="input" 
            placeholder="Username">
            <br />
            
            <input type="password" name="signPass" id="signPass"  class="input" 
            placeholder="Password"> 
            <br />
            
            <input type="password" name="confPass" id="confPass"  class="input" 
            placeholder="Confirm Password">
            <br />
            
            <input type="text" name="enterCode" id="enterCode"  class="input" 
            placeholder="Enter Code">
            <br />
            <input type="submit" name="signSubmit" value="Login">
        </fieldset>    
    </form>
SIGNUP;


if(isset($_POST["signSubmit"])){  
    $msg = '';

    //$name = filter_var($_POST['signName'], FILTER_SANITIZE_STRING);    
    //$x = filter_var($name, FILTER_VALIDATE_FLOAT);

    // try{
        $sql = "SELECT * FROM users WHERE userName = :user";     
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":user", $name);
        $name = $_POST['signName'];
        $stmt->execute();

        if($stmt->rowCount() == 0){
            $sql = "INSERT INTO users (userName, password) 
            VALUES ('$name', '$pass')";    
            $conn->exec($sql);
            $msg =  "Records inserted successfully.";
            header("Location: profileEdit.php");
        }else{
            $msg = "This username is already taken.";
        }


        
    // } catch(PDOException $e){
    //     // die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    //     $msg = $e->getMessage();
    // }    
}