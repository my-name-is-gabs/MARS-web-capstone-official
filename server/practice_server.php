<?php
session_start();

$user_table = $_SESSION['username'];

include_once('./db_connection.php');

$Title = $_SESSION['title_session'];

$select_from_title_table = mysqli_query($connection, "SELECT * FROM `{$user_table}_{$Title}`");
  if(!$select_from_title_table) die("Error in the query");
  

  $card_arrays = [];

  while($row = mysqli_fetch_assoc($select_from_title_table)) {
    $card_arrays[] = $row;
  }
  
 echo json_encode($card_arrays, JSON_PRETTY_PRINT);
?>