<?php
// Header
require "pageHead.php";

//Body

//require "form.html";

require "queries/login.php";
require "queries/signup.php";

// echo "Mesage from index.php: ";
echo "<pre>";
print_r($_POST);    
print_r($msg);
echo "</pre>";   


//Footer
require "pageFoot.php";
