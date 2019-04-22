<?php
// Header
require "pageHead.php";

//Body
echo "<a href='index.php'>Home</a>";



if(!empty($_FILES['imgUpload'])){
    unlink($_SESSION['img']);

    $sqlChange = "UPDATE users SET img_url = :img_url WHERE userName = :name";
    $stmt = $conn->prepare($sqlChange);
    $stmt->bindParam(":img_url", $img_url);
    $stmt->bindParam(":name", $name);
    $img_name = uniqid() . $_FILES['imgUpload']['name'];
    $img_url = "uploads/" . $img_name;
    $name = $_SESSION['user'];
    $img = $_SESSION['img'] = $img_url;

    $stmt->execute();    

    move_uploaded_file($_FILES['imgUpload']['tmp_name'], $img_url);
    
    

    echo "<pre>";
    print_r($_FILES['imgUpload']);
    print_r($_POST);    
    echo "</pre>";
}

$name = $_SESSION['user'];
$img = $_SESSION['img'];

include "profileForm.php";

echo <<<IMG_UPLOAD
    <form action="profileEdit.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="imgUpload" id="imgUpload" />
        <input type="submit" name="imgSubmit" value="Image Upload">
    </form>
IMG_UPLOAD;





//Footer
require "pageFoot.php";