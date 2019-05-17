<?php
// Header
require "templates/pageHead.php";

//Body

if(isset($_SESSION['loggedin'])){
    header("Location: profile.php");    
}else{
    require "templates/form.php";    
}  

if(isset($msg)){
    echo $msg;
}

//Footer
require "templates/pageFoot.php";
