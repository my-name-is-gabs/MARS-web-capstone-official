<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <script>
    history.forward(0);</script>
</body>
</html>
<?php

session_start();

$_SESSION['username'] = null;

session_destroy();

header('location:../index.html');
?>

