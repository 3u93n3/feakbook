<?php
// Header
require "templates/pageHead.php";


//Body

if(isset($_SESSION['loggedin'])){
    require "templates/navigation.php";
    echo "<h2 class='pageTitle'>Edit Profile</h2>";    

    if(!empty($_FILES['imgUpload'])){
        require "queries/imgUpload.php";
    }

    require "templates/profileForm.php";

echo <<<IMG_UPLOAD
    <div class="centred">
        <form action="profileEdit.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="imgUpload" id="imgUpload" />
            <input type="submit" name="imgSubmit" value="Image Upload">
        </form>
    </div>
IMG_UPLOAD;

if(isset($_SESSION['msg'])){
    echo "<p class='errMsg centred'>" . $_SESSION['msg'] . "</p>";
    $_SESSION['msg'] = "";
}
}else{
    header("Location: index.php");
}

//Footer
require "templates/pageFoot.php";