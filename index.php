<?php
// Header
require "templates/pageHead.php";

//Body

if(isset($_SESSION['loggedin'])){
    header("Location: profile.php");
    // unset($stmt);
    // unset($conn);
}else{
    require "templates/form.php";    
}  

if(isset($msg)){
    echo $msg;
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
}




//Footer
require "templates/pageFoot.php";
