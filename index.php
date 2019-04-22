<?php
// Header
require "pageHead.php";

//Body

//require "form.html";

if(isset($_SESSION['user'])){
    header("Location: profile.php");
}else{
    require "queries/login.php";
    require "queries/signup.php";
}


// echo "Mesage from index.php: ";
if(isset($msg)){
    echo "<pre>";
    print_r($_POST);    
    print_r($msg);
    echo "</pre>";
}
   


//Footer
require "pageFoot.php";
