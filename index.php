<?php
// Header
require "templates/pageHead.php";

//Body

if(isset($_SESSION['user'])){ //loggedin
    header("Location: profile.php");
}else{
    require "templates/form.php";    
}  


//Footer
require "templates/pageFoot.php";
