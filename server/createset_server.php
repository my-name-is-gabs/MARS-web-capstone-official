<?php 
session_start();
include_once('./db_connection.php');

$user_table = $_SESSION['username'];


$raw_json = file_get_contents("php://input");

$data = json_decode($raw_json, true);

$set_table_title = $data['set_table'];

$title = $data['title'];

$cards_array = $data['cardsArr'];


$new_table_query = "
    CREATE TABLE `{$user_table}_{$set_table_title}` (
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        title_cat VARCHAR(255),
        term VARCHAR(255),
        definition VARCHAR(255)
    );
";

$create_table = mysqli_query($connection, $new_table_query);

if(!$create_table) die('Error in creating table');


$card_title_query = "INSERT INTO {$user_table}_dash_title (title, table_title) VALUES ('{$title}', '{$set_table_title}')";

$card_title = mysqli_query($connection, $card_title_query);

if(!$card_title) die("Error in inserting title to dash_title_table");


foreach($cards_array as $cards) {

    $inserting_values_query = "INSERT INTO `{$user_table}_{$set_table_title}` (title_cat, term, definition) VALUES ('{$cards['title_cat']}', '{$cards['term']}', '{$cards['definition']}')";

    $inserting_values = mysqli_query($connection, $inserting_values_query);

    if(!$inserting_values) die('Error in inserting values on the table');
}
