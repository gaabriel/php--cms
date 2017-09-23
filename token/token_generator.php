<?php
$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));


//generate token
$token = sha1(uniqid($address, true));
// make URL.  
$url = "http://127.0.0.1/projects/test/token/activate_token.php?token=$token";

include 'token_mailer.php';


if(!isset($emailtester))
{
  header('location:../registrator.php');
}


$dt = new DateTime();
$dateandtime = $dt->format('Y-m-d H:i:s');


if(isset($_REQUEST['submit']))
{
	$address = $_REQUEST['remail'];

	$query = "INSERT INTO   pending_users
                       		(token, token_email, token_stamp)
       		VALUES
       				(
        				'{$token}', 
        				'{$address}',
        				'{$dateandtime}'
        			)";
	mysqli_query($db, $query) or die(mysqli_error($db));
}

?>