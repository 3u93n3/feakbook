<?php

// Header
require "templates/pageHead.php";

//Body
if(isset($_SESSION['loggedin'])){
    require "templates/navigation.php";
    echo "<h2 class='pageTitle'>Posts</h2>";  
    require "templates/profileForm.php";

echo <<<_POST
    <form class='centred' action="queries/postInsert.php" method="POST">
        Public:
        <input type="radio" name="public" value="1" checked="checked">
        | Friend:
        <input type="radio" name="public" value="0">
        <br />
        Title:
        <input type="text" name="subject" id="subject">
        <br />
        <textarea name="post" id="post" cols="30" rows="10"></textarea>
        <br />
        <input type="submit" value="Post" name="post_btn">
    </form>
_POST;
    
    require "queries/postRead.php";
}else{
    header("Location: index.php");
}

//Footer
require "templates/pageFoot.php";