<?php

// Header
require "templates/pageHead.php";

//Body
if(isset($_SESSION['loggedin'])){
    require "templates/navigation.php";
    echo "<h2 class='pageTitle'>Friends</h2>";
    require "templates/profileForm.php";

    echo "<div class='centred'>";
        echo "<div class='usersList'><p class='list'>List of active users</p>";
        require "queries/usersList.php";
        echo "</div>";

        echo "<div class='usersList'><p>Received invitation/s</p>";
        require "queries/invitationReceived.php";
        echo "</div>";

        echo "<div class='usersList'><p>Sent invitation/s</p>";
        require "queries/invitationSent.php";
        echo "</div>";

        echo "<div class='usersList'><p>Your friend/s</p>";
        require "queries/friend.php";
        echo "</div>";
    echo "</div>";

}else{
    header("Location: index.php");
}



//Footer
require "templates/pageFoot.php";
