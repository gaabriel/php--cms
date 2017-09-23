<?php
	$db = mysqli_connect('localhost','root','')or die('Unable to connect. Check your connection parameters.');
	mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));

	$bodyASKP = str_replace(' ', '&nbsp;', $_POST['askrbody']);
	$bodyASKP = nl2br($bodyASKP);
	$bodyASKP = strip_tags($bodyASKP, '<br/>');

		/*$bodyASKP = str_replace('<br/><br/>', '<br/>', $bodyASKP);
	$bodyASKP = str_replace('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '&nbsp;', $bodyASKP);
		$bodyASKP = str_replace('&nbsp;&nbsp;&nbsp;&nbsp;', '&nbsp;', $bodyASKP);
		$bodyASKP = str_replace('&nbsp;&nbsp;&nbsp;', '&nbsp;', $bodyASKP);
		$bodyASKP = str_replace('&nbsp;&nbsp;', '&nbsp;', $bodyASKP);
		$bodyASKP = str_replace('&nbsp;&nbsp;', '&nbsp;', $bodyASKP);
		$bodyASKP = str_replace('&nbsp;&nbsp;', '&nbsp;', $bodyASKP);*/

$redirect = $_POST['askrseeID'];

$dt = new DateTime();
$dateandtime = $dt->format('Y-m-d H:i:s');

	if((strlen($bodyASKP) >= '10') && (strlen($bodyASKP) <= '500'))
	{
    	$query = "INSERT INTO   askreply
    	                        (askr_uid, askr_body, askr_stamp, askr_aim )
            	VALUES  (
	                        '{$_POST['askruID']}',
    	                    '{$bodyASKP}',
            	            '{$dateandtime}',
            	            '{$_POST['askrseeID']}'
                	    )";
    	mysqli_query($db, $query) or die(mysqli_error($db));

    	echo "<h2 id='set-updater-text'>Success!</h2>";
$urlback = "location:see.php?id=". $redirect;
echo $urlback;
    	header($urlback);
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