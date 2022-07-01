<?php
require_once 'db.php';


// home 

function getPostsFil ($type, $start) {
    $db = dbConnect();
    $qry = "SELECT * FROM posts ORDER BY id DESC LIMIT $start, 6";
    if($type == 'normal'){
        $qry = "SELECT * FROM posts WHERE type='$type' ORDER BY id DESC LIMIT $start, 6";
    }
    $result = mysqli_query($db, $qry);
    return $result;
}

function getPostsCount ($type) {
    $db = dbConnect();
    $qry = "SELECT * FROM posts ORDER BY id DESC ";
    if($type == 'normal'){
        $qry = "SELECT * FROM posts WHERE type='$type' ORDER BY id DESC ";
    }
    $result = mysqli_query($db, $qry);
    return mysqli_num_rows($result);
}

function getPostsFilCategory ($id, $type) {
    $db = dbConnect();
    $qry = "SELECT * FROM posts WHERE category_id=$id ORDER BY id DESC";
    if($type == 'normal'){
        $qry = "SELECT * FROM posts WHERE category_id=$id AND type='$type' ORDER BY id DESC";
    }
    $result = mysqli_query($db, $qry);
    return $result;
}

function check ($id) {
    $db = dbConnect();
    $qry = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($db, $qry);
    return $result;
}

function getCaNames ($id) {
    $db = dbConnect();
    $qry = "SELECT name FROM categories WHERE id=$id";
    $result = mysqli_query($db, $qry);
    return $result;
}




function getPosts () {
    $db = dbConnect();
    $qry = "SELECT * FROM posts ";
    $result = mysqli_query($db, $qry);
    return $result;
}

function getPost ($id) {
    $db = dbConnect();
    $qry = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($db, $qry);
    return $result;
}

// posts

function insertPost ($title, $body, $type, $category_id, $thumbnail) {
    $db = dbConnect();
    $time = getTime();
    $qry = "INSERT INTO posts (title, body, type, category_id, created_at, thumbnail) VALUES ('$title', '$body', '$type', $category_id, '$time', '$thumbnail') ";
    $result = mysqli_query($db, $qry);  
    return $result;
}

function updatePost ($title, $body, $type, $category_id, $thumbnail, $id) {
    $db = dbConnect();
    $time = getTime();
    $qry = "UPDATE posts SET title='$title', body='$body', category_id=$category_id, thumbnail='$thumbnail', created_at='$time' WHERE id=$id ";
    $result = mysqli_query($db, $qry);  
    return $result;
}

function deletePost ($id) {
    $db = dbConnect();
    $qry = "DELETE FROM posts WHERE id=$id";
    $result = mysqli_query($db, $qry);
    return $result;
}


// category 

function insertCategory ($name) {
    $time = getTime();
    $db = dbConnect();
    $qry1 = "SELECT * FROM categories WHERE name='$name' ";
    $fil = mysqli_query($db, $qry1);
    if (mysqli_num_rows($fil)) {
        return header('location: ../admin_create_category.php');
    }
    $qry = "INSERT INTO categories (name, created_at) VALUES ( '$name', '$time' ) ";
    $result = mysqli_query($db, $qry);
    if($result){
        return true;
    }else{
        return false;
    }
}

function getCategories () {
    $db = dbConnect();
    $qry = "SELECT * FROM categories";
    $result = mysqli_query($db, $qry);
    if($result){
        return $result;
    }else{
        echo 'false';
    }
}

function getCategory ($id) {
    $db = dbConnect();
    $qry = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($db, $qry);
    if($result){
        return $result;
    }else{
        echo 'false';
    }
}

function updateCategory ($id, $name) {
    $db = dbConnect();
    $time = getTime();
    $qry = "UPDATE categories SET name='$name',updated_at='$time' WHERE id=$id";
    $result = mysqli_query($db, $qry);
    if($result){
        return $result;
    }else{
        echo 'false';
    }
}

function deleteCategory ($id) {
    $db = dbConnect();
    $qry = "DELETE FROM categories WHERE id=$id";
    $result = mysqli_query($db, $qry);
    if($result){
        return $result;
    }else{
        return false;
    }
}

?>
