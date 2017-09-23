<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));



//create the usersbank table
$query = 'CREATE TABLE g_bank 
        (
            group_id		INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
            group_name		VARCHAR(50) NOT NULL,
            group_code      VARCHAR(10) NOT NULL,
            group_from      VARCHAR(40) NOT NULL,
            group_founder	INTEGER UNSIGNED NOT NULL,
            PRIMARY KEY (group_id)
        )';
mysqli_query($db, $query) or die (mysqli_error($db));



echo 'Database successfully created';


?>