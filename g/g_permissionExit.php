<?php
    session_start();

    $link = mysqli_connect("localhost", "root", "", "generaldata");
    $gId = mysqli_real_escape_string($link,$_GET['gid']);
    $ID = $_SESSION['ownID'];

    $query = "SELECT GU_id,GU_level FROM G_Ulink WHERE GU_uid='{$ID}' AND GU_gid='{$gId}'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $digger = mysqli_num_rows($result);

    switch ($digger) 
    {
        case 0:
            $query = "INSERT INTO G_Ulink (GU_uid,GU_gid,GU_level) VALUES ('{$ID}','{$gId}','B')";
            mysqli_query($link, $query) or die(mysqli_error($link)); 
            header("location:groups.php?id=".$gId);
        break;
        
        default:
            $query = "UPDATE G_Ulink SET GU_uid={$ID},GU_gid={$gId},GU_level='B' WHERE GU_uid='{$ID}' AND GU_gid='{$gId}'";
            mysqli_query($link, $query) or die(mysqli_error($link)); 
            header("location:groups.php?id=".$gId);
        break;
    }
?>