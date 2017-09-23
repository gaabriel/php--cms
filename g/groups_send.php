<head>
    <title>group send</title>
    <meta name="viewport" content="width=device-width, initial-scale=.55, maximum-scale=.55">
</head>
 
<?php
    session_start();

    $dt = new DateTime();
    $dateandtime = $dt->format('Y-m-d H:i:s');

    $link = mysqli_connect("localhost", "root", "", "generaldata");
    $groupSender = mysqli_real_escape_string($link,$_GET['gp']);
    $groupID = mysqli_real_escape_string($link,$_POST['groupID']);

    $IDp = $_SESSION['ownID'];
    //$img = mysqli_real_escape_string($link,$_POST['groupImg']);
    $img = /*isset($img)?$img:*/'NULL';

    if($groupSender==0)//say
    {
        $textgs = mysqli_real_escape_string($link,$_POST['groupsay']);
        $query = "INSERT INTO   Gsay (gSay_uid,gSay_gSay,gSay_imglink,gSay_stamp,gSay_groupID)
                VALUES ( '{$IDp}', '{$textgs}', '{$img}', '{$dateandtime}', '{$groupID}' )";
        mysqli_query($link,$query) or die(mysqli_error($link));
        header('location:groups.php');
    }
    
    if($groupSender==1)//ask
    {
        $textga = mysqli_real_escape_string($link,$_POST['groupask']);
        $query = "INSERT INTO   Gask (gAsk_uid,gAsk_gAsk,gAsk_imglink,gAsk_stamp,gAsk_groupID)
                VALUES ( '{$IDp}', '{$textga}', '{$img}', '{$dateandtime}', '{$groupID}' )";
        mysqli_query($link,$query) or die(mysqli_error($link));
        header('location:groups.php');
    }

    if($groupSender==2)//upload
    {
        $query = "INSERT INTO   Gupf (gAsk_uid,gAsk_gAsk,gAsk_imglink,gAsk_stamp,gAsk_groupID)
                VALUES ( '{$IDp}', '{$textga}', '{$img}', '{$dateandtime}', '{$groupID}' )";
        mysqli_query($link,$query) or die(mysqli_error($link));
        header('location:groups.php');
    }