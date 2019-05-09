<?php

// Header
require "templates/pageHead.php";

//Body

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

// require "queries/postInsert.php";

if(isset($_POST['post_btn'])){
    echo "Ypu pres button";

}

if(isset($_GET['post'])){
    echo $_GET['post'];
}


require "queries/postRead.php";


//Footer
require "templates/pageFoot.php";