<?php
session_start();

$link = mysqli_connect("localhost", "root", "", "generaldata");
if (mysqli_connect_errno()) 
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

require '../_base/outbasestuff.php';
?>

<title>ClassSurfer | Send Token</title>

<div id="tok"></div>


<?php
$emailtester = mysqli_real_escape_string($link,$_POST["remail"]);

if(!isset($emailtester))
{
	header('location:../registrator.php');
}

if (!filter_var($emailtester, FILTER_VALIDATE_EMAIL)) 
{
	echo "<h3>Invalid email format!<br>";
	echo "<a href='../registrator.php'>go back</a></h3>";
}
else
{
	if(isset($_REQUEST['submit']))
	{
		$address = $emailtester;

		$sql = "SELECT * FROM usersbank
				WHERE user_email = '$address'";
		$query = mysqli_query($link,$sql) or die(mysqli_error($link));
		$digger = mysqli_num_rows($query);

		$sql2 = "SELECT * FROM pending_users
				WHERE token_email = '$address'";
		$query2 = mysqli_query($link,$sql2) or die(mysqli_error($link));
		$digger2 = mysqli_num_rows($query2);


		$dbcount = $digger + $digger2 ;

		switch($dbcount)
		{
    		case 0:
        		echo "<br/><br/><h3>Generating Token ... check your email box!</h3>";
				require 'token_generator.php';
        	break;

    		case 1:
        		switch($dbcount)
        		{
    				case $digger:
        				echo "<br/><br/><h2>Error, this email address is already taken!</h2>";
						echo "<h3><a href='../registrator.php'>go to Register Page</a></h3>";
						echo "<h3><a href='../login.php'>go to Login Page</a></h3>";
        			break;

        			case $digger2:
        				echo "<br/><br/><h2>This email already received a token!</h2>";
						echo "<h3><a href='../registrator.php'>go to Register Page</a></h3>";
						echo "<h3><a href='../login.php'>go to Login Page</a></h3>";
        			break;
        		}
        	break;

    		case 2:
        		echo "Email recently registred, account already created and verified";
				echo "<h3><a href='../registrator.php'>go to Register Page</a></h3>";
				echo "<h3><a href='../login.php'>go to Login Page</a></h3>";
        	break;
		}
		
	}
	else
	{
		echo "<h3>Empty! please fill the form in a right way.<br>";
		echo "<a href='../registrator.php'>go back</a></h3>";
	}
}

?>