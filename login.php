<?php
session_unset();session_start();
?>

<html>

<head>
	<meta charset="UTF-8"/>
	<title>ClassSurfer | Start</title>
	<link rel="stylesheet" href="basicstyle.css"/>
	<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" type="image/x-icon" href="_img/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=.78, maximum-scale=1.1">
</head>


<body>


<div class="navbar">
	<h1>ClassSurfer</h1>
</div>

<div id="login">
	<form method="post" action="cms_page/login_valid.php">
		<fieldset class="space">
			<h2>Login</h2>
			<h3><label for="lEmail">Email:<br></label><input type="text" name="lEmail" id="lEmail" size="22" minlength="3" maxlength="255" placeholder="ex: a.smith@email.com"></h3>
			<h3><label for="lPass">Password:<br></label><input type="password" name="lPass"  id="lPass" size="22" minlength="8" maxlength="21" placeholder="space: 8 to 21"></h3>
			<h3><input type="submit" name="submit" value="Login" class="button" id="logbut"/></h3>
			<h3><a href="registrator.php">Create Account</a></h3>
		</fieldset>
	</form>
</div>


<div class="footer"><p>Copyright &copy; 2015 - ClassSurfer - All rights reserved </p></div>


</body>

</html>