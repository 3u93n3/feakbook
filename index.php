<?php
// Header
require_once "pageHead.php";

//Body

?>

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


<?php


if(isset($_POST["logSubmit"])){    
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
}

if(isset($_POST["signSubmit"])){    
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    require_once "queries/signup.php";
    echo "Mesage from index.php: " . $msg;
}

// echo <<<LOGIN
// <form action="index.php" method="post">
// <fieldset>
//     <legend>Login</legend>
//     <label for="logName">Username:</label>
//     <br />
//     <input type="text" name="logName" id="logName">
//     <br />
//     <label for="logPass">Password:</label>
//     <br />
//     <input type="password" name="logPass" id="logPass">
//     <br />
//     <input type="submit" name="logSubmit" id="login" value="Login">
// </fieldset>    
// </form>
// LOGIN;

//Footer
require_once "pageFoot.php";
?>