<?php 

require_once 'dbSym.php';

if(isset($_POST['submit'])){
    if($_POST['name']){
        $result = insertCategory($_POST['name']);
        switch ($result) {
            case true:
                return header('location: ../admin_all_categories.php');
                break;
            case false:
                return header('location: ../admin_create_category.php');
                break;
            default:
                break;
        }
    }else{
        return header('location: ../admin_create_category.php');
    }
}


?>