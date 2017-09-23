<?php
session_start();

if((!isset($_POST['lEmail']) == true) and (!isset($_POST['lPass']) == true))
{
	header('location:../login.php');
}


$link = mysqli_connect("localhost", "root", "", "generaldata");
if (mysqli_connect_errno()) 
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

	$mail = mysqli_real_escape_string($link,$_POST['lEmail']);
	$pass = sha1($_POST['lPass']);

	$sql = "SELECT user_id FROM usersbank
			WHERE user_email = '{$mail}' AND user_passcrypt = '{$pass}'";
	$query = mysqli_query($link,$sql) or die(mysqli_error($link));
	$digger = mysqli_num_rows($query);

	while ($rows=mysqli_fetch_array($query))
	{
		extract($rows);
		$ownID = $user_id;
	}

	switch($digger) 
	{
		case '1':
			$_SESSION['ownID'] = $ownID;
			$_SESSION['lEmail'] = $mail;
			$_SESSION['lPass'] = $pass;
			header('location:home.php');
		break;
		
		default:
			include('../_base/outbasestuff.php');
			echo "<br/><br/><br/><br/><h2>Error, please check the provided information</h2>";
			echo "<h3>Don't let any input empty</h3>";
			echo "<input type='button' value='Back' onClick='history.go(-1);return true;' class='backbut'/>";
		break;
	}

?>