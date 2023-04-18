<?php
session_start();
$_SESSION['login'] = null;
session_destroy();
header("location: login.php");
?>