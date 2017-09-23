<?php
// Connection to MySQL
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_BASE", "pending_users");


if(!isset($emailtester))
{
  header('location:../registrator.php');
}


// E-mail TO target
$address = $_REQUEST['remail'];
define("EMAIL_TARGET", "$address");

$message = "<h3>Thanks for join ClassSurfer! Go to: $url to activate your account.</h3>";


include "../_foreigner/PHPMailer/PHPMailerAutoload.php";

$email = new PHPMailer();

$email->isSMTP();
$email->Host = "smtp.gmail.com";
$email->Port = 587;
$email->SMTPSecure = 'tls';
$email->SMTPAuth = true;
$email->Username = "class.surfer@gmail.com";
$email->Password = "";//nope
$email->setFrom("class.surfer@gmail.com", "ClassSurfer");
$email->addAddress(EMAIL_TARGET);
$email->Subject = "Token from ClassSurfer";
$email->msgHTML($message);

$email->send();


?>