<?php
	$link = mysqli_connect("localhost", "root", "", "generaldata");

	$bodyASKP = str_replace(' ', '&nbsp;', $_POST['askpbody']);
	$bodyASKP = nl2br($bodyASKP);
	$bodyASKP = strip_tags($bodyASKP, '<br/>');

$dt = new DateTime();
$dateandtime = $dt->format('Y-m-d H:i:s');

	if((strlen($bodyASKP) >= '10') && (strlen($bodyASKP) <= '800') && (strlen($_POST['titleAskp']) >= '4') && (strlen($_POST['titleAskp']) <= '80'))
	{
    	$query = "INSERT INTO askposts (askp_uid, askp_body, askp_title, askp_stamp) VALUES ('{$_POST['askpuID']}','{$bodyASKP}','{$_POST['titleAskp']}','{$dateandtime}')";
    	mysqli_query($link, $query) or die(mysqli_error($link));

    	$_POST['askpuID']="";$_POST['titleAskp']="";
    	echo "<h2 id='set-updater-text'>Success!</h2>";
    	header( "location:ask.php" );
	}
	else
	{
		include('../_base/outbasestuff-cms.php');
		include('../_base/_cms-bar.php');
	?>
		<html>
	<head>
		<title>Ask | ClassSurfer</title>
		<meta name="viewport" content="width=device-width, initial-scale=.92, maximum-scale=1.3">
	</head>
		<body>
		<br><br><br><br>
		<h2>respect the minimum and maximum spaces!</h2>
		<input type='button' value='Back' onClick='history.go(-1);return true;' class='backbut'/>
		</body>
		</html>
<?php
	}
?>