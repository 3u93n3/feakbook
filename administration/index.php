<?php
session_start();
require "../includes/dbc.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../styles/admin.css" />
        <title>Feakbook</title>
    </head>
    <body>
        <div id="container">

<?php
echo "<h2>Admin</h2>";


if(isset($_GET['msg'])){
    echo $_GET['msg'];
}

if(isset($_SESSION['admin'])){
    
    echo "Hello " . $_SESSION['admin'];
    echo "<br>";
    

    echo "<br><a href='logout.php'>Log Out</a>";
    echo "<br><a href='codeGenerator.php'>Generate code</a>";
    echo "<br>";
    echo "<h4>Active code/s</h4>";
    require "activeCodes.php";

   
}else{
    echo <<<_LOGIN
    <form action="adminLogin.php" method="POST">
        Administrator:
        <br>
        <input type="text" name="admin" >
        <br>
        Password:
        <br>
        <input type="password" name="adminPass" >
        <br>
        <input type="submit" value="Login">
    </form>
_LOGIN;

}

?>

</div>

    <script></script>
</body>
</html>