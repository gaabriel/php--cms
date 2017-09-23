<?php
session_start();
	
$link = mysqli_connect("localhost", "root", "", "generaldata");
$vote = mysqli_real_escape_string($link,$_GET['askv']);
$repId = mysqli_real_escape_string($link,$_GET['repId']);
$fromId = mysqli_real_escape_string($link,$_GET['fromId']);
$voterID = $_SESSION['ownID'];

if(isset($vote))
{
	$query = "SELECT v_id,v_rid,v_uid FROM askvotes WHERE v_rid='{$repId}' AND v_uid='{$voterID}'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$digger = mysqli_num_rows($result);

	switch ($digger) 
	{
		case 0:
			$query = "INSERT INTO askvotes(v_v,v_rid,v_uid) VALUES ('{$vote}','{$repId}','{$voterID}')";
			mysqli_query($link, $query) or die(mysqli_error($link));
		break;
		
		default:
			$query = "UPDATE askvotes SET v_v='{$vote}',v_rid='{$repId}',v_uid='{$voterID}' WHERE v_rid='{$repId}' AND v_uid='{$voterID}'";
			mysqli_query($link, $query) or die(mysqli_error($link));
		break;
	}

	$urlback = "location:see.php?id=". $fromId;
	header($urlback);
}

//echo "<script>window.close();</script>";

?>