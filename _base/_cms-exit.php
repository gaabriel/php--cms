<?php
session_start();
if((isset ($_SESSION['lEmail']) == true) and (isset ($_SESSION['lPass']) == true))
{
	unset($_SESSION['lEmail']);
	unset($_SESSION['lPass']);
	unset($_SESSION['ownID']);
	unset($_SESSION['ownURL']);
	header('location:../login.php');
}
?>