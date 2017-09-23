<?php
session_start();

$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));

/*
$query = 'CREATE TABLE Gsay
        (
            gSay_id         INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            gSay_uid        INTEGER NOT NULL,
            gSay_groupID    INTEGER NOT NULL,
            gSay_gSay       VARCHAR(200) NOT NULL,
            gSay_imglink    INTEGER,
            gSay_stamp      DATETIME NOT NULL
        );';
mysqli_query($db, $query) or die (mysqli_error($db));

$query = 'CREATE TABLE Gask
        (
            gAsk_id         INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            gAsk_uid        INTEGER NOT NULL,
            gAsk_groupID    INTEGER NOT NULL,
            gAsk_gAsk       VARCHAR(800) NOT NULL,
            gAsk_imglink    INTEGER,
            gAsk_stamp      DATETIME NOT NULL
        );';
mysqli_query($db, $query) or die (mysqli_error($db));

$query = 'CREATE TABLE Gupf
        (
            gUpf_id         INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            gUpf_uid        INTEGER NOT NULL,
            gUpf_groupID    INTEGER NOT NULL,
            gUpf_filename   VARCHAR(40) NOT NULL,
            gUpf_filelink   INTEGER,
            gUpf_stamp      DATETIME NOT NULL
        );';
mysqli_query($db, $query) or die (mysqli_error($db));
*/

$query = 'CREATE TABLE G_Ulink
        (
            GU_id       INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            GU_uid      INTEGER NOT NULL,
            GU_gid      INTEGER NOT NULL,
            GU_level    CHAR(1)
        );';
mysqli_query($db, $query) or die (mysqli_error($db));







/*
$query = 'CREATE TABLE Gcomment
        (
            gComm_id      INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            gComm_uid     INTEGER NOT NULL, 
            gComm_aimgp   INTEGER NOT NULL,
            gComm_greply  VARCHAR(128) NOT NULL,
            gComm_stamp   DATETIME NOT NULL,
            gComm_body    VARCHAR(500),   fgr_imglink INTEGER
        );';
mysqli_query($db, $query) or die (mysqli_error($db));


$query = 'CREATE TABLE GvotesP
        (
            gv_id    INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            gv_gpid   INTEGER NOT NULL,
            gv_guid   INTEGER NOT NULL,
            gv_v     CHAR(1) NOT NULL
        );';
mysqli_query($db, $query) or die (mysqli_error($db));


$query = 'CREATE TABLE G
        (
            fgr_id      INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fgr_uid     INTEGER NOT NULL,
            fgr_aimgp   INTEGER NOT NULL,
            fgr_greply  VARCHAR(128) NOT NULL,
            fgr_stamp   DATETIME NOT NULL,
            fgr_body    VARCHAR(500),   fgr_imglink INTEGER
        );';
mysqli_query($db, $query) or die (mysqli_error($db));


$query = 'CREATE TABLE zFiles_GLib
        (
            fgl_id        INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fgl_ownerid   INTEGER NOT NULL,
            fgl_groupid   INTEGER NOT NULL,
            
            fgl_name      VARCHAR(128) NOT NULL,
            fgl_file      VARCHAR(128) NOT NULL,
            fgl_stamp     DATETIME NOT NULL
        );';
mysqli_query($db, $query) or die (mysqli_error($db));

/*
$query = 'CREATE TABLE zFiles_Public
        (
            fp_id       INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fp_ownerid  INTEGER NOT NULL,
            fp_groupid  INTEGER NOT NULL,
            fp_askpid   VARCHAR(256) NOT NULL,
            fp_stamp    DATETIME NOT NULL
        );';
mysqli_query($db, $query) or die (mysqli_error($db));


echo 'Database successfully created';
*/

?>