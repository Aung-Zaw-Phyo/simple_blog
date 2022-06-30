<?php
require_once 'dbSym.php';

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $category_id = $_POST['category_id'];
    $type = $_POST['type'];
    $thumbnail = '';
    if( strlen($_FILES['thumbnail']['name']) > 0 ){
        $thumbnail = mt_rand(time(), time()).'_'.$_FILES['thumbnail']['name'];
    }

    if( strlen($title)<=0 or strlen($body)<=0 ){
        return header('location: ../admin_create_post.php');
    }

    move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../assets/uploads/'.$thumbnail);
    $result = insertPost($title, $body, $type, $category_id, $thumbnail);
    switch ($result) {
        case true:
            return header('location: ../admin.php');
            break;
        case false:
            return header('location: ../admin_create_post.php');
            break;
        default:
            break;
    }
}

?>