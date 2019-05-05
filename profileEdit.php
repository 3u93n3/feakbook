<?php
// Header
require "templates/pageHead.php";


//Body
echo "<h2>Edit Profile</h2>";

require "templates/navigation.php";

if(!empty($_FILES['imgUpload'])){
    require "queries/imgUpload.php";
}

require "templates/profileForm.php";

echo <<<IMG_UPLOAD
    <form action="profileEdit.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="imgUpload" id="imgUpload" />
        <input type="submit" name="imgSubmit" value="Image Upload">
    </form>
IMG_UPLOAD;

//Footer
require "templates/pageFoot.php";