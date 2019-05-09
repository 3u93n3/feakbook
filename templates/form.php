<?php

require "queries/login.php";
require "queries/signup.php";

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
unset($stmt);
unset($conn);
?>