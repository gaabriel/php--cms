<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));


//alter the movie table to include running time, cost and takings fields
$query = 'ALTER TABLE usersbank ADD COLUMN 
        (
            user_url        VARCHAR(30) NOT NULL
        )';

mysqli_query($db,$query) or die (mysqli_error($db));


echo 'Database successfull';


?>