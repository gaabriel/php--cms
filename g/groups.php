<?php
	include('../_base/outbasestuff-cms.php');
	include('../_base/_cms-bar.php');
?>

<html>

<body>
	<div id="marginstart"></div>
<section class='groupcc'>

<div class='grouplayout'>

<?php
$link = mysqli_connect("localhost", "root", "", "generaldata");
$ID = $_SESSION['ownID'];
include '../cms_page/group-functions.php';

if(isset($_GET['id']))
{
	$IDgr = mysqli_real_escape_string($link,$_GET['id']);
} else { $IDgr=0; }

if($IDgr>0)
{
	GroupPanel($IDgr);Permission($IDgr,$ID);

	if($c!=0) 
	{
		if($perm=='A')
		{
		
?>			<section id="lgroup">
				<div class='rgpanel'>
					<div>
						<h3><?php echo $panel[0]; ?></h3>
						<h2><?php echo $panel[1]; ?></h2>
						<h4><?php echo $panel[2]; ?></h4>
					</div>
				</div>
				<div class='rgpanel'><div>
					<a href='mlist.php?id=<?php echo $IDgr; ?>'>- members list -</a>
					<h6><a href="g_permissionExit.php?gid=<?php echo $IDgr; ?>">Leave Group</a></h6>
				</div></div>
			</section>

			<section id="rgroup">
				<div class='abaspace'>
					<div class="abag">
						<input type="radio" id="ag1" name="inputgg" checked><label for="ag1">Say</label>
		       			<div class="abatext"><span class="abauno">
				       		<form method='post' action='groups_send.php?gp=0' autocomplete='off'>
								<textarea name='groupsay' onkeyup='gpost_grow(this);' minlength='1' maxlength='200' 	placeholder='from 10 to 200 chars' wrap=VIRTUAL TextMode='MultiLine'></textarea>
								<input type="text" style="display:none;" name="groupID" value="<?php echo $IDgr; ?>">
								<section id='gbutsay'><input type='submit' value='Say' class='gsaybut'/></section>
							</form>
						</span></div>
					</div>
					<div class="abag">
						<input type="radio" id="ag2" name="inputgg"><label for="ag2">Ask</label>
						<div class="abatext"><span class="abados">
	    	   				<form method='post' action='groups_send.php?gp=1' autocomplete='off'>
								<textarea name='groupask' onkeyup='gpost_grow(this);' minlength='1' maxlength='800' 	placeholder='from 10 to 800 chars' wrap=VIRTUAL TextMode='MultiLine'></textarea>
								<input type="text" style="display:none;" name="groupID" value="<?php echo $IDgr; ?>">
								<section id='gbutask'><input type='submit' value='Ask' class='gaskbut'/></section>
							</form>
						</span></div>
					</div>
					<div class="abag">
						<input type="radio" id="ag3" name="inputgg"><label for="ag3">Upload</label>
						<div class="abatext2"><span id="ggblock">
							<form action="../g/gupFile.php" method="post" enctype="multipart/form-data">
    							<p>Select a File to upload:</p>
				    			<h5 id="gupf">FileName:<input type='text' name='groupfile' maxlength='40'placeholder='optional / max:40'/></h5>
				    			<input type="text" style="display:none;" name="groupID" value="<?php echo $IDgr; ?>">
	    						<h4><input type="file" name="fileUp" id="fileUp"></h4>
    							<h4><input type="submit" value="Send" name="submit" class='gupfbut'></h4>		
							</form>
						</span></div>
					</div>
				</div>
			</section>

			<section id="rgfeed">
<?php			require('../cms_page/ask-functions.php');
				echo "<h3 id='titleaskpaskp'>RECENT:&nbsp;</h3>";
				RelASKPosts(20);
				echo "<h3 id='footaskpaskp' style='display:none;'><a href=''>show more</a></h3>";
?>			</section>


			
<?php 	
		}

		if($perm=='B')
		{
?>
			<div class='rgpanel'>
				<div>
					<h3><?php echo $panel[0]; ?></h3>
					<h2><?php echo $panel[1]; ?></h2>
					<h4><?php echo $panel[2]; ?></h4>

					<div class='g-perm'>
						<a href="g_permission.php?gid=<?php echo $IDgr; ?>"><h3>you left, re-join?</h3></a>
					</div>
				</div>
			</div>
<?php
		}

		if($perm!='A' && $perm!='B')
		{
?>
			<div class='rgpanel'>
				<div>
					<h3><?php echo $panel[0]; ?></h3>
					<h2><?php echo $panel[1]; ?></h2>
					<h4><?php echo $panel[2]; ?></h4>

					<div class='g-perm'><a href="g_permission.php?gid=<?php echo $IDgr; ?>"><h4>Join this Group</h4></a></div>
				</div>
			</div>
<?php
		}
	}
}
else
{
	MyGroups($ID);
}



/*

$urlc = $_GET['id'];

		$askpfile = $urlc;
		require ( '../cms_page/ask-functions.php');
		askpIDpage($askpfile);

		$askrseeID = $urlc;
		askReply($ID,$askrseeID);
		echo "<h3 id='titleaskraskr'>Answers:</h3>";
		RelASKReply($urlc,$ID);	
		*/	


?>



</div>

</section>
</body>

<head>
	<title>Group </title>
	<meta name="viewport" content="width=device-width, initial-scale=.92, maximum-scale=1.3">
</head>

</html>