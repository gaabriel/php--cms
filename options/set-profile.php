<html>

<head>
	<title>Set Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=.55, maximum-scale=.55">
</head>

<?php
	include('../_base/outbasestuff-cms.php');
	include('../_base/_cms-bar.php');
?>

<body>
<div id="marginstart"></div>
<section id="setprofile">
<?php 
	require('../cms_page/cms-function.php');
    PshowProfile();
?>
	<form method="post" id="setProf" action="set-updater.php?uq=1">
    <fieldset id="setProf1">
        <h2>Your Social:</h2>
        <h3><label for="pCourse"> Course: </label><br/><input type="name" name="pCourse" id="pCourse" size="25" minlength="2" maxlength="30" placeholder="Electrical Engineering" value="<?php echo $_SESSION['INFOtotal'][8]; ?>"></h3>
        <h3><label for="pFace"> Facebook.com/ </label><br/><input type="name" name="pFace" id="pFace" size="25" maxlength="50" placeholder="your complement" value="<?php echo $_SESSION['INFOtotal'][9]; ?>"></h3>
        <h3><label for="pTwitter"> Twitter.com/ </label><br/><input type="name" name="pTwitter" id="pTwitter" size="25" maxlength="40" placeholder="your complement" value="<?php echo $_SESSION['INFOtotal'][10]; ?>"></h3>
        <h3><label for="pInsta"> Instagram.com/ </label><br/><input type="name" name="pInsta" id="pInsta" size="25" maxlength="40" placeholder="your complement" value="<?php echo $_SESSION['INFOtotal'][11]; ?>"></h3> 
        <span id="set-x2"><div><input type="submit" name="submit" value="Update" class="button"/></div></span>
    </fieldset>
    </form>

</section>

</body>

</html>

