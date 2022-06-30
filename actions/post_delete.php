<?php
    require_once 'dbSym.php';

    if(isset($_POST['submit'])){
        $result = deletePost($_POST['id']);
        
        switch ($result) {
            case true:
                return header('location: ../admin.php');
                break;
            case false:
                return header('location: ../admin.php');
                break;
            default:
                break;
        }
    }
?>