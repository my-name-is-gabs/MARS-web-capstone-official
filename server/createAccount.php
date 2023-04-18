<?php
include_once('./db_connection.php');


if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

    $query = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");

    if(mysqli_num_rows($query) == 1){
        header("Location: ../signup.html?error=true");
    }else{
        
        $insert_values = mysqli_query($connection, "INSERT INTO user (username, password) VALUES ('$username', '$encrypted_password')");

        $dash_title_table = "
            CREATE TABLE {$username}_dash_title (
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                title VARCHAR(255),
                table_title VARCHAR(255)
            );
        ";

        $create_user_profile_img = "
            CREATE TABLE {$username}_user_profile (
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(50),
                image MEDIUMBLOB
            );
        ";
        
        $create_dash_title_tables = mysqli_query($connection, $dash_title_table);

        $user_profile_table = mysqli_query($connection, $create_user_profile_img);

        if (!$insert_values || !$create_user_profile_img || !$create_dash_title_tables)
        {
            die('Error: ' . mysqli_error($connection));
        }

        header('location: ../signup.html?success=true');
    }

}



?>
