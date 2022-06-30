<?php
    require_once 'mySession.php';

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "simple_blog");

    function dbConnect () {
        $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (mysqli_connect_errno()) {
           return false;
        }else {
            return $connect;
        }
    }

    function insert ($name, $username, $email, $password) {
        $password = genPass($password);
        $currentTime = getTime();
        $db = dbConnect();
        $qry1 = "SELECT * FROM users WHERE username='$username' ";
        $usernameFilter = mysqli_query($db, $qry1);

        $qry2 = "SELECT * FROM users WHERE email='$email' ";
        $emailFilter = mysqli_query($db, $qry2);
        
        if (mysqli_num_rows($usernameFilter) || mysqli_num_rows($emailFilter)) {
            return 'User has already been taken!';
        } else {
            $qry = "INSERT INTO users (name, username, email, password, created_at, updated_at)
                     VALUES ('$name', '$username', '$email', '$password', '$currentTime', '$currentTime')";
            $result = mysqli_query($db, $qry);
            if ($result) {
                return 'Register Successfully!';
            }else {
                return 'Register Fail!';
            }

        }

    }

    function login ($email, $password) {
        $password = genPass($password);
        $db = dbConnect();
        $qry = "SELECT * FROM users WHERE email='$email' && password='$password' ";
        $result = mysqli_query($db, $qry);
        if (mysqli_num_rows($result)) {
            $username = '';
            foreach($result as $single){
                $username = $single['username'];
                if ($single['is_admin']) {
                    setSession('is_admin', $single['is_admin']);
                }
            }
            setSession('username', $username);
            return 'login Success!';
        } else {
           return 'Please register firstly!'; 
        }
        
    }

    function genPass ($pass) {
        $pass = md5($pass);
        $pass = sha1($pass);
        $pass = crypt($pass, $pass);
        return $pass;
    }

    function getTime () {
        return date("Y-m-d H:i:s", time());
    }

?>