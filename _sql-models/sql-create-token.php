<?php
session_start();

$db = mysqli_connect('localhost','root','')or die('Unable to connect.Check your connection parameters.');
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));



//create the usersbank table
$query = 'CREATE TABLE pending_users 
        (
        	token_id	INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            token 		CHAR(40) NOT NULL,
            token_email	VARCHAR(50) NOT NULL,
            token_stamp DATETIME NOT NULL
        )';
mysqli_query($db, $query) or die (mysqli_error($db));



echo 'table successfully created';


?>