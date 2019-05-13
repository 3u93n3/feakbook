<?php
// Header
require "templates/pageHead.php";

//Body
if(isset($_SESSION['loggedin'])){
    
    echo "<h2>Profile</h2>";
    // echo "<a href='index.php'>Home</a><br />";
    // echo "<a href='logout.php'>Logout</a><br />";
    // echo "<a href='profileEdit.php'>Edit Profile</a>";
    require "templates/navigation.php";

    $img = $_SESSION['img'];
    $name = $_SESSION['user'];

    // echo "<br />" . $name . "<br />" . $img;

    require "templates/profileForm.php";

}else{
    header("Location: index.php");
}

//Footer
require "templates/pageFoot.php";
