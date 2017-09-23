<?php
	session_start();
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
					<a href='groups.php?id=<?php echo $IDgr; ?>'>- group home -</a>
				</div></div>
			</section>

			<section id="rgroup">
				<h1>Membros:</h1>
				<?php ListGmembers($IDgr); ?>
			</section>
<?php 	
		}
	}
}

?>



</div>

</section>
</body>

<head>
	<title>Group Members</title>
	<meta name="viewport" content="width=device-width, initial-scale=.92, maximum-scale=1.3">
</head>

</html>