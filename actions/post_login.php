<?php 
    session_start();
    require_once 'data_check.php';
    require_once 'mySession.php';
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $return = loginUser($email, $password);

        $message = '';
        switch ($return) {
            case 'Your data is incorrect!':
                $message = 'Your data is incorrect!';
                setSession('message', $message);
                header('Location: ../login.php');
                break;
            case 'Please register firstly!':
                $message = 'Please register firstly!';
                setSession('message', $message);
                header('Location: ../login.php');
                break;
            case 'login Success!':
                $message = 'login Success!';
                header("Location: ../index.php");
                break;
            default:
                break;
        }
    }
?>