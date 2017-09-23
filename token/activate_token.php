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

<head>
    <title>ClassSurfer | Form</title>
    <link rel="shortcut icon" type="image/x-icon" href="../_img/favicon.ico">
</head>

<div id="tok"></div>

<?php
// verify token
if(isset($_GET['token']) && preg_match('/^[0-9A-F]{40}$/i', $_GET['token']))
{
    $token = mysqli_real_escape_string($link,$_GET['token']);
}


$_SESSION['token'] = $token;
$tolkien = $_SESSION['token'];
if(!isset($tolkien))
{
    unset($_SESSION['token']);
    header('location:../registrator.php');
}

// verify token
$sql = "SELECT token_email FROM pending_users
        WHERE token = '$token'";
$query = mysqli_query($link,$sql) or die(mysqli_error($link));
$digger = mysqli_num_rows($query);
$searched = mysqli_fetch_assoc($query);


if($digger == 1)
{
    foreach ($searched as $retrieveEmail) 
    {
        $sesmail = $retrieveEmail;
    }

    $sql2 = "SELECT user_email FROM usersbank
            WHERE user_email = '$sesmail'";
    $query2 = mysqli_query($link,$sql2) or die(mysqli_error($link));
    $digger2 = mysqli_num_rows($query2);
    if ($digger2>0) 
    {
        echo "this user is already registred<br/>you will be redirected to login page";
        header("refresh: 6; url=../login.php");
    }
    else
    {
        echo "Success, token match user email<br/>";
        echo $sesmail."<br/>";
        require 'registrator_form.php';
    }
    
}
else
{
    echo "Error on database, token didn't match user email";die();
}

?>