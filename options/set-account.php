<html>

<head>
	<title>Set Account</title>
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
    $pGenre = $_SESSION['INFOtotal'][6];
?>
	<form method="post" id="setProf" action="set-updater.php?uq=0">
    <fieldset id="setProf1">
        <h2>Your Account:</h2>
        <h3><label for="pName"> Name: </label><br/><input type="name" name="pName" id="pName" size="25" minlength="2" maxlength="40" value="<?php echo $_SESSION['INFOtotal'][4]; ?>"></h3>
        <h3><label for="pLast"> LastName: </label><br/><input type="name" name="pLast" id="pLast" size="25" minlength="3" maxlength="40" value="<?php echo $_SESSION['INFOtotal'][5]; ?>"></h3>
        <h3 id="birt"><label for="pBirth" class="lef"> Birthdate:</label><input type="date" name="pBirth" id="pBirth" class="righ" value="<?php echo $_SESSION['INFOtotal'][7]; ?>"></h3>
        <h3><label for="pEmail"> Email: </label><br/><input type="text" name="pEmail" maxlength="80" size="25" value="<?php echo $_SESSION['INFOtotal'][1]; ?>"></h3>
        <h3><label for="pPass"> Password: </label><br/><input type="password" name="pPass" id="pPass" size="25" minlength="8" maxlength="21" value="<?php echo $_SESSION['INFOtotal'][2]; ?>"></h3>
        <div>
            <fieldset id="setProf2">
                <h4>Gender:</h4><?php radialToGenre($pGenre); ?>
            </fieldset>
        </div>
        <span id="set-x"><input type="submit" name="submit" value="Update" class="button"/></span>
    </fieldset>
    </form>

</section>

</body>

</html>

