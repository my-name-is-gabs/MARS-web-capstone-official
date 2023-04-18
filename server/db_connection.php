<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'mars_db');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if(!$connection)
    die("Error in connecting DB");
