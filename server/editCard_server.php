<?php
include_once('./db_connection.php');
session_start();

$user_table = $_SESSION['username'];

if(isset($_POST['editTerm']) && isset($_POST['editContent']) && isset($_POST['card_id'])) {

    $card_id = mysqli_real_escape_string($connection, $_POST['card_id']);
    $editTerm = mysqli_real_escape_string($connection, $_POST['editTerm']);
    $editDefinition = mysqli_real_escape_string($connection, $_POST['editContent']);

    $updateContents = mysqli_query($connection, "UPDATE `{$user_table}_{$_SESSION['card_title']}` SET term='{$editTerm}', definition='{$editDefinition}' WHERE id={$card_id} ");
    
    if(!$updateContents) die("Error in updating table " . mysqli_error($connection));

    header("Location: ../pages/set.php?title={$_SESSION['card_title']}");
}

