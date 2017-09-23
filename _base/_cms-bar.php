
<head>
	<link rel="shortcut icon" type="image/x-icon" href="../_img/favicon.ico">
</head>

<?php
session_start();

if((!isset ($_SESSION['lEmail']) == true) and (!isset ($_SESSION['lPass']) == true))
{
	unset($_SESSION['lEmail']);
	unset($_SESSION['lPass']);
	unset($_SESSION['ownID']);
	header('location:../login.php');
}
?>


<div class="cmsbar">
	<div id="bartool">
		<a href="../_base/_cms-exit.php">exit</a>
	</div>
	<h1>ClassSurfer</h1>
    <tr>
		<a href="../cms_page/home.php">Home</a>
		<a href="../display/profile.php">Profile</a>
		<a href="../g/groups.php">Groups</a>
		<a href="../cms_page/cms-search.php">Search</a>
	</tr>
</div>

