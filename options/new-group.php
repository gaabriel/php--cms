<?php
$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));

include('../_base/outbasestuff-cms.php');
include('../_base/_cms-bar.php');
?>

<html>

<head>
    <title>Create Group</title>
    <link rel="shortcut icon" type="image/x-icon" href="../_img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=.55, maximum-scale=.55">
</head>

<body>
<div id="marginstart"></div>
<section id="newGroup">

<form method="post" id="formngroup" action="new-group-proc.php">
    <fieldset>
    	<h2>New Group:</h2>
        <h3><label for="ngName"> Group Name: </label><br/><input type="name" name="ngName" id="fName" size="25" minlength="4" maxlength="50" placeholder="ex: introduction to management"></h3>
        <h3><label for="ngFrom"> From: </label><br/><input type="text" name="ngFrom" id="ngFrom" size="25" minlength="5" maxlength="40" placeholder="ex: university of somewhere"></h3>
        <h3 id="ngc"><label for="ngCode"> Code: &nbsp;&nbsp;</label><input type="name" name="ngCode" id="ngCode" size="10" minlength="3" maxlength="10" placeholder="adm-0101"></h3>
        <h3 style="display:none;"><input type="text" name="ngFounder" value="<?php echo $_SESSION['ownID']; ?>"></h3>
        <div><input type="submit" name="submit" value="Submit" class="button"/></div>
    </fieldset>
</form>

</section>

</body>

</html>
























