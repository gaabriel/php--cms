<?php
session_unset();session_start();
?>


<html>

<head>
	<meta charset="UTF-8"/>
	<title>ClassSurfer | Register</title>
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
	<form method="post" action="token/registrator_proc.php">
		<fieldset class="space">
			<h2>Join us!</h2>
			<h3>Email: <br><input type="text" name="remail" size="18" placeholder="email"/></h3>
			<h3><input type="submit" name="submit" value="Register" id="logregis" class="button"/></h3>
			<h3><a href="login.php">go to Login</a></h3>
		</fieldset>
	</form>
</div>


</body>

</html>