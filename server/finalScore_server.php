<?php session_start();
  $get_incorrect_answer = json_decode(file_get_contents('php://input'), true);

  var_dump($get_incorrect_answer);
  $_SESSION['incorrect'] = $get_incorrect_answer;
?>