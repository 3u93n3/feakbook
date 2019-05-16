<?php

// Header
require "templates/pageHead.php";

//Body
if(isset($_SESSION['loggedin'])){
    echo "<h2>Posts</h2>";

    require "templates/navigation.php";

    require "templates/profileForm.php";

echo <<<_POST
    <form action="queries/postInsert.php" method="POST">
        Public:
        <input type="radio" name="public" value="1" checked="checked">
        <br />
        Friend:
        <input type="radio" name="public" value="0">
        <br />
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