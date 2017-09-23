<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));

//create the relUserToGroup table
$query = 'CREATE TABLE relUserToGroup
        (
            rel_id			INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
            user_id	        INTEGER UNSIGNED,
            group_id        INTEGER UNSIGNED,
            level_id		INTEGER UNSIGNED,
            PRIMARY KEY (rel_id)
        )';// 4*visitor* 3*regular* 2*mod* 1*adm* 0*client*
mysqli_query($db, $query) or die (mysqli_error($db));



echo 'Database relation successfully created';


?>