<?php
session_start();

//connect to mysql
$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');

//make sure database is the active one
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));




//insert new data into the movie table for each movie
$query = 'UPDATE movie SET  movie_running_time = 101,
                            movie_cost = 81,
                            movie_takings = 242.6
        WHERE movie_id = 1';

mysqli_query($db,$query) or die(mysqli_error($db));


$query = 'UPDATE movie SET  movie_running_time = 89,
                            movie_cost = 10,
                            movie_takings = 10.8
        WHERE movie_id = 2';

mysqli_query($db,$query) or die(mysqli_error($db));





echo 'Database successfull';


?>