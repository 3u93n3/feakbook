<?php
session_start();
require_once "../includes/dbc.php";

if(isset($_POST['post_btn'])){
    $author = $_SESSION['user'];
    $subj = $_POST['subject'];
    $post = $_POST['post'];
    $public = $_POST['public'];

    $sql = "INSERT INTO posts (author, subject, post, public) 
    VALUES ('$author', '$subj', '$post', '$public')";

    $conn->exec($sql);    

    header("Location: ../publications.php?action=post");
}

