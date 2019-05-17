<?php

$_SESSION['msg'] = "";

try{
    if($_FILES['imgUpload']['error'] == 0){
        if(!empty($_SESSION['img']) ){
            if($_SESSION['img'] != "img.png"){
                unlink($_SESSION['img']); 
            }
        }   

        $fileTypes = array('jpg', 'png', 'gif', 'tif');
        $img_extension = explode(".", $_FILES['imgUpload']['name']);
        //$fileArr = explode(".", $$img_extension);
        $fileExtension = end($img_extension );

        //Chekin if file is image
        if(in_array($fileExtension, $fileTypes)){
            echo "File type is ok <br>";
        }else{
            $_SESSION['msg'] .= "File isn't  right type ";
            $_SESSION['img'] = "img.png";
            exit;
        }

        //Chekin if file right size
        if($_FILES['imgUpload']['size'] < 1024 * 1024){
            echo "File size is ok <br>";
        }else{
            $_SESSION['msg'] .= "File is biger than 1MB";
            $_SESSION['img'] = "img.png";
            exit;
        }
    
        $sqlChange = "UPDATE users SET img_url = :img_url WHERE userName = :name";
        $stmt = $conn->prepare($sqlChange);
    
        $stmt->bindParam(":img_url", $img_url);
        $stmt->bindParam(":name", $name);    
        
        $img_name = uniqid() . "." . $fileExtension;
        $img_url = "uploads/" . $img_name;    
        $img = $_SESSION['img'] = $img_url;
        $name = $_SESSION['user'];
    
        $stmt->execute();    
        move_uploaded_file($_FILES['imgUpload']['tmp_name'], $img_url);
    }
    
    
}catch(PDOException $e){
    $_SESSION['msg'] .= "<br>" . $e->getMessage() . "<br>" . $e->getTraceAsString();
}

unset($stmt);