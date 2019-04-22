<?php
// Header
require "pageHead.php";

//Body
echo "<h2>Profile</h2>";
echo "<a href='index.php'>Home</a><br />";
echo "<a href='logout.php'>Logout</a><br />";
echo "<a href='profileEdit.php'>Edit Profile</a>";

$name = $_SESSION['user'];
$img = $_SESSION['img'];

// echo "<br />" . $name . "<br />" . $img;


include "profileForm.php";


//Footer
require "pageFoot.php";
