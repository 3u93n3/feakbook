<?php

echo <<<LOGIN
    <form action="index.php" method="post">
        <fieldset>
            <legend>Login</legend>        
            <input type="text" name="logName" id="logName" class="input"  
            placeholder="Username">
            <br />        
            <input type="password" name="logPass" id="logPass" class="input" 
            placeholder="Password">
            <br />
            <input type="submit" name="logSubmit" id="login" value="Login">
        </fieldset>    
    </form>
LOGIN;

if(isset($_POST["logSubmit"])){   
    $msg = '';

    // try{
        
        $sql = "SELECT * FROM users WHERE userName = :user";     
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":user", $name);
        $name = $_POST['logName'];
        $stmt->execute();

        if($stmt->rowCount() == 1){
            while($row = $stmt->fetch()){
                $msg = $row;
            }
        }else{
            $msg = "No account found with that username.";
        }

        
        //$msg =  "Records inserted successfully.";
    // } catch(PDOException $e){
    //     // die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    //     $msg = $e->getMessage();
    // }
    unset($stmt);
    unset($conn);
}

