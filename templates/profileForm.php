<?php

$img = $_SESSION['img'];
$name = $_SESSION['user'];

echo <<<PROFILE
    <hr>
    <div class="centred" id="prf">    
        <div id="img_cntr">
            <img src="$img" alt="profile picture">
        </div>
        <p>$name</p>
    </div>
PROFILE;