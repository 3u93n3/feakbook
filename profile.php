<?php
// Header
require "templates/pageHead.php";

//Body
if(isset($_SESSION['loggedin'])){
    require "templates/navigation.php";
    echo "<h2 class='pageTitle'>Profile</h2>";    

    $img = $_SESSION['img'];
    $name = $_SESSION['user'];    

    require "templates/profileForm.php";

}else{
    header("Location: index.php");
}

//Footer
require "templates/pageFoot.php";
