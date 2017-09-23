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


<div class="startASKP">
<?php 
	$ID = $_SESSION['ownID'];
	require('../cms_page/ask-functions.php');
	askPost($ID);
	echo "<h3 id='titleaskpaskp'>RECENT:&nbsp;</h3>";
	RelASKPosts(20);
	echo "<h3 id='footaskpaskp' style='display:none;'><a href=''>show more</a></h3>";
?>
</div>

</section>
</body>

</html>