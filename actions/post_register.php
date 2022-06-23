<?php 
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo "Name is $name. <br> Username is $username. <br> Email is $email. <br> Password is $password.";
    }
?>