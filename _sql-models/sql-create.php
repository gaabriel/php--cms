<?php
session_start();

$db = mysqli_connect('localhost','root','')or die('Unable to connect.Check your connection parameters.');
//create a database
/*$query = 'CREATE DATABASE generaldata'; mysqli_query($db, $query) or die(mysqli_error($db));*/
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));


//create the usersbank table
$query = 'CREATE TABLE usersbank 
        (
            user_id			INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
            user_email		VARCHAR(80) NOT NULL,
            user_password   CHAR(21) NOT NULL,
            user_passcrypt  CHAR(21) NOT NULL,
            user_name		VARCHAR(40) NOT NULL,
            user_lastname	VARCHAR(40) NOT NULL,
            user_gender		CHAR(1) NOT NULL,
            user_birthday	DATE NOT NULL,
            user_course     VARCHAR(30) NOT NULL,
            user_facebook   VARCHAR(50) NOT NULL,
            user_twitter    VARCHAR(40) NOT NULL,
            user_instagram  VARCHAR(40) NOT NULL, 
            PRIMARY KEY (user_id, user_email)
        )';
mysqli_query($db, $query) or die (mysqli_error($db));


echo 'Database successfully created';

?>