<?php 
include_once('../server/db_connection.php');

if(isset($_GET['id'])) {
    $delete_suggestion = mysqli_query($connection, "DELETE FROM suggestion_tbl WHERE id={$_GET['id']}");

    if(!$delete_suggestion)
        die("Error in deleting value " . mysqli_error($connection));

    header("location: ./suggestion.php");
}