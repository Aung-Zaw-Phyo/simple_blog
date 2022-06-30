<?php 

require_once 'dbSym.php';


if(isset($_POST['submit'])){
    $result = updateCategory($_POST['id'], $_POST['name']);
    switch ($result) {
        case true:
            return header('location: ../admin_all_categories.php');
            break;
        case false:
            return header('location: ../admin_all_category.php');
            break;
        default:
            break;
    }
}else{
    return header('location: ../admin_all_categories.php');
}

?>