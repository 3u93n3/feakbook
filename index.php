<?php
// Header
require "templates/pageHead.php";

//Body
if(isset($_SESSION['loggedin'])){
    header("Location: profile.php");    
}else{
    require "templates/form.php";   
    if(isset($_SESSION['msg'])){
        echo "<p class='errMsg centred'>" . $_SESSION['msg'] . "</p>";
        $_SESSION['msg'] = "";
    }     
}  

//Footer
require "templates/pageFoot.php";
