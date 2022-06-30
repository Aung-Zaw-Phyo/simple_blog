<?php
require_once 'dbSym.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $type = $_POST['type'];
    $category_id = $_POST['category_id'];
    if( strlen($title)<=0 or strlen($body)<=0 ){
        return header('location: ../admin.php');
    }
    $thumbnail = '';
    if( strlen($_FILES['thumbnail']['name']) > 0 ){
        $thumbnail = mt_rand(time(), time()).'_'.$_FILES['thumbnail']['name'];
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../assets/uploads/'.$thumbnail);
    }else{
        $thumbnail = $_POST['oldThumbnail'];
    }

    $result = updatePost($title, $body, $type, $category_id, $thumbnail, $id);
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