<?php
	include('../_base/outbasestuff-cms.php');
	include('../_base/_cms-bar.php');
?>

<html>

<head>
	<title>Ask | ClassSurfer</title>
	<meta name="viewport" content="width=device-width, initial-scale=.92, maximum-scale=1.3">
</head>

<body>
<div id="marginstart"></div>
	
<section id="ask1">


<?php 
	$ID = $_SESSION['ownID'];

	if(isset($_GET['id']))
	{
		$urlc = /*str_replace("/", '',*/ $_GET['id']/*)*/;

		$askpfile = $urlc;
		require ( '../cms_page/ask-functions.php');
		askpIDpage($askpfile);

		$askrseeID = $urlc;
		askReply($ID,$askrseeID);
		echo "<h3 id='titleaskraskr'>Answers:</h3>";
		RelASKReply($urlc,$ID);
	}
	else
	{
		echo "look for an id:<br/><form method='get'><input type='number' name='id' value='Submit'></form>";
	}
	
?>


</section>
</body>

</html>
