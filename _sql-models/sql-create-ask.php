<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));



/*
$query = 'CREATE TABLE askposts 
        (
            askp_id     INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            askp_uid    INTEGER NOT NULL,
            askp_body   VARCHAR(800) NOT NULL,
            askp_stamp  DATETIME NOT NULL,
            askp_title  VARCHAR(80) NOT NULL
        );';
mysqli_query($db, $query) or die (mysqli_error($db));



$query = 'CREATE TABLE askreply
        (
            askr_id     INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            askr_uid    INTEGER NOT NULL,
            askr_body   VARCHAR(500) NOT NULL,
            askr_stamp  DATETIME NOT NULL,
            askr_aim    INTEGER NOT NULL
        );';
mysqli_query($db, $query) or die (mysqli_error($db));
*/

$query = 'CREATE TABLE askvotes
        (
            v_id    INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            v_rid   INTEGER NOT NULL,
            v_uid   INTEGER NOT NULL,
            v_v     CHAR(1) NOT NULL
        );';
mysqli_query($db, $query) or die (mysqli_error($db));











echo 'Database successfully created';


?>