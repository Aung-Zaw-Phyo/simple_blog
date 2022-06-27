<?php
    require_once 'db.php';

    function registerUser ($name, $username, $email, $password) {
        if (nameCheck($name) && usernameCheck($username) && emailCheck($email) && passCheck($password)) {
            return insert($name, $username, $email, $password);
        }else {
            return 'Your data is incorrect!';
        }
    }

    function loginUser ($email, $password) {
        if (emailCheck($email) && passCheck($password)) {
            return login($email, $password);
        } else {
            return 'Your data is incorrect!';
        }
    }

    function nameCheck ($name) {
        if (strlen($name) >= 3) {
            $check = preg_match('/^[\w\s]+$/', $name);
            return $check;
        }else{
            // echo 'Name must be at least 3 character!';
            return false;
        }
    }

    
    function usernameCheck ($username) {
        if (strlen($username) >= 3) {
            $check = preg_match('/^[\w\s]+$/', $username);
            return $check;
        }else{
            // echo 'Username must be at least 3 character!';
            return false;
        }
    }

    function emailCheck ($email) {
        if (strlen($email) >= 15) {
            $check = preg_match('/^[a-zA-Z0-9]+@[a-z]+\.+[a-z]{2,4}+$/', $email);
            return $check;
        }else {
            // echo 'Email must be at least 15 character!';
            return false;
        }
    }
    
    function passCheck ($password) {
        if (strlen($password) >= 6) {
            $check = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', $password) ;
            return $check;
        } else {
            // echo 'Password must be at least 6 character!';
            return false;
        }
    }

    // echo userData('Linn Khit', 'linn khit', 'linnkhit@gmail.com', 'aaAA123###');

?>