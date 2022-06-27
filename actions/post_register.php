<?php 
    session_start();
    require_once 'data_check.php';
    require_once 'mySession.php';
    
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $return = registerUser($name, $username, $email, $password);

        $message = '';
        switch ($return) {
            case 'Your data is incorrect!':
                $message ='Your data is incorrect!';
                setSession('message', $message);
                header("Location: ../register.php");
                break;
            case 'User has already been taken!':
                $message ='User has already been taken!';
                setSession('message', $message);
                header("Location: ../register.php");
                break;
            case 'Register Successfully!':
                $message ='Register Successfully!';
                setSession('username', $username);
                header("Location: ../index.php");
                break;
            case 'Register Fail!':
                $message ='Register Fail!';
                setSession('message', $message);
                header("Location: ../register.php");
                break;
            default:
                break;
        }
        

    }
    


?>