<?php

// Header
require "templates/pageHead.php";

//Body

echo "<h2>Friends</h2>";

require "templates/navigation.php";


require "templates/profileForm.php";

echo "<div class='usersList'><p class='list'>List of active users</p>";
require "queries/usersList.php";
echo "</div>";

echo "<div class='usersList'><p>Received invitation/s</p>";
require "queries/invitationReceived.php";
echo "</div>";

echo "<div class='usersList'><p>Invitation/s sent</p>";
require "queries/invitationSent.php";
echo "</div>";




//Footer
require "templates/pageFoot.php";
