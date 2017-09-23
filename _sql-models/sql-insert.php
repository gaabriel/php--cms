<?php
session_start();

//connect to mysql
$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');

//make sure database is the active one
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));


// insert data into the movie table
/*
$query = "INSERT INTO   usersbank 
                        (user_username, user_password)
        VALUES
       	(
        	'{$_POST['username']}', 
        	'{$_POST['password']}'
        )";
mysqli_query($db, $query) or die(mysqli_error($db));
*/
$query = "INSERT INTO G_Ulink (GU_uid,GU_gid,GU_level)
        VALUES ( 4, 4, 1 )";
mysqli_query($db, $query) or die(mysqli_error($db));


echo 'Insertion process successfull';


?>