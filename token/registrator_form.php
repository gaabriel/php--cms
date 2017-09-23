<html>

<body>

<?php
if(!isset($tolkien))
{
    unset($_SESSION['token']);
    header('location:../registrator.php');
}

$fEmail = $retrieveEmail;
?>
    <title>ClassSurfer | Form</title>
    <link rel="shortcut icon" type="image/x-icon" href="../_img/favicon.ico">

<form method="post" id="tokform" action="registrator_final.php">
    <fieldset class="spaceplus">
        <h3><label for="fName"> Name: </label><br/><input type="name" name="fName" id="fName" size="30" minlength="2" maxlength="30" placeholder="ex: Adam"></h3>
        <h3><label for="fLast"> LastName: </label><br/><input type="name" name="fLast" id="fLast" size="30" minlength="3" maxlength="30" placeholder="ex: Smith"></h3>
        <h3><label for="fBirth"> Birthdate:&nbsp;&nbsp;&nbsp;&nbsp; </label><input type="date" name="fBirth" id="fBirth"></h3>
        <h3 style="display:none;"><input type="text" name="fEmail" autocomplete="off" value="<?php echo $fEmail; ?>"></h3>
        <h3><label for="fPass"> Password: </label><br/><input type="password" name="fPass" id="fPass" size="30" minlength="8" maxlength="21" placeholder="space: 8 to 21" autocomplete="off"></h3>
        <fieldset id="gendff">
            <h4> Gender: </h4>
            <input type="radio" name="fSex" id="fMale" value="M" checked><label for="fMale"> Male &nbsp;&nbsp;</label>
            <input type="radio" name="fSex" id="fFem" value="F"><label for="fFem"> Female </label>
        </fieldset>
        <h3><input type="submit" name="submit" value="Submit" class="button" id="tokformbut"/></h3>
    </fieldset>
</form>


</body>

</html>