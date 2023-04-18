<?php
session_start();
ob_start();
include_once('./db_connection.php');
$user_table = $_SESSION['username'];

if(isset($_GET['delete_set'])) {
    $set_title = mysqli_real_escape_string($connection, $_GET['delete_set']);
    $delete_cat_query = mysqli_query($connection, "DELETE FROM `{$user_table}_dash_title` WHERE title='{$set_title}'");
    $delete_query = mysqli_query($connection, "DROP TABLE `{$user_table}_{$set_title}`");

    if(!$delete_query || !$delete_cat_query) dir("Error in dropping the table");

    header("Location: ../pages/dash.php");
}