<?php
	include('../_base/outbasestuff-cms.php');
	include('../_base/_cms-bar.php');

$ID = $_SESSION['ownID'];

	if(isset($_GET['user']))
	{
		$link = mysqli_connect("localhost", "root", "", "generaldata");
		$lookID = mysqli_real_escape_string($link,$_GET['user']);

		require('../cms_page/cms-function.php');
		ifexist($lookID);
		profil($lookID);
		
		$firstnameS = $_SESSION['IDshow'][0];
		$lastnameS = $_SESSION['IDshow'][1];
		$fullnameS = $firstnameS." ".$lastnameS;
		$courseS = strtoupper($_SESSION['IDshow'][2]);

		$IDresp = responsiveName($fullnameS);
		$IDcourseR = responsiveCourse($courseS);

		$socfS = $_SESSION['IDshow'][3];
		$soctS = $_SESSION['IDshow'][4];
		$sociS = $_SESSION['IDshow'][5];
?>
	<html>
		<body>
			<div id="marginstart"></div>
		<section id="profilepage">
			<div class="seeprofile">
				<div>	
					<div id="avatarprof">
						<img src="../_img/300.png" alt="avatar">
					</div>
					<div id="mainprof">
				<?php
						echo "<h1 ".$IDresp.">".$firstnameS." ".$lastnameS."</h1>";
						echo "<h2 ".$IDcourseR.">".$courseS."</h2>";
				?>
					</div>
				</div>
				<div>
					<div id="socialprof">
				<?php
					if($socfS != '')
					{
						echo "	<a id='socf' href='https://www.facebook.com/".$socfS."'>
									<img src='../_img/faceicon.png' alt='facebook' height='30' width='30'>
								</a>";
					}
					if($soctS != '') 
					{
						echo "	<a id='soct' href='https://www.twitter.com/".$soctS."'>
									<img src='../_img/twittericon.png' alt='twitter' height='30' width='30'>
								</a>";
					}
					if($sociS != '') 
					{
						echo "	<a id='soci' href='https://www.instagram.com/".$sociS."'>
									<img src='../_img/instaicon.png' alt='instagram' height='30' width='30'>
								</a>";
					}
				?>
					</div>
					<div id="groupsprof">
				<?php
					echo "<h3>uasHASDuhasSDJASDJasu<br>suahsauashasuhasuashasuhasu<br>ushasuhasuas
							hasuashuashasuashuash<br>asuhasuashasuhasuhasuashasu<br>dudhuadhaduhad
							uadhaduh<br>suashuashasuhasuash</h3>";
				?>
					</div>
				</div>
			</div>
		</section>
		
		</body>
		<head>
			<title><?php echo $fullnameS; ?></title>
			<meta name="viewport" content="width=device-width, initial-scale=.92, maximum-scale=1.2">
		</head>
	</html>
<?php
	}
	else
	{
		require('../cms_page/cms-function.php');
		noprof();
	}
?>