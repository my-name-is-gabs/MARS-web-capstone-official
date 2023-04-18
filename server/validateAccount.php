<?php
include_once('./db_connection.php');
session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {

    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");

    if(mysqli_num_rows($query) === 0) {
        header('location:../index.html');
    }

    while($row = mysqli_fetch_assoc($query)) {
        if(password_verify($password, $row['password'])) {     
            $_SESSION['username'] = $username;
            header("location:../pages/dash.php");           
        } else
            header('location:../index.html');
    }
}





