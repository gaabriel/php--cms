<?php
session_start();

$link = mysqli_connect("localhost", "root", "", "generaldata");
if (mysqli_connect_errno()) 
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

require '../_base/outbasestuff.php';
?>

    <title>ClassSurfer | Form</title>
    <div id="tok"></div>

<?php



$tolkien = $_SESSION['token'];
if(!isset($tolkien))
{
    unset($_SESSION['token']);
    header('location:../registrator.php');
}
else
{
    unset($_SESSION['token']);

    echo "<h3>Sent Info:</h3><p>";
    echo $_POST['fEmail'];echo "<br/>";
    echo $_POST['fName'];echo " | ";
    echo $_POST['fLast'];echo "<br/>";
    echo $_POST['fPass'];echo " | ";
    echo $_POST['fSex'];echo " | ";
    echo $_POST['fBirth'];
    echo "</p><br/>";
}





if(isset($_REQUEST['submit']))
{
    if (empty($_POST['fPass'])) 
    {
        $b = 1;
    }
    else
    {
        $b = 0;
    }
    if (empty($_POST['fName'])) 
    {
        $c = 1;
    }
    else
    {
        $c = 0;
    }
    if (empty($_POST['fLast'])) 
    {
        $d = 1;
    }
    else
    {
        $d = 0;
    }
    if (empty($_POST['fBirth'])) 
    {
        $e = 1;
    }
    else
    {
        $e = 0;
    }

    $diagnose = $b + $c + $d + $e;
    echo "Blank forms: ".$diagnose."<br/>";



$crypt = sha1($_POST['fPass']);




    $address = $_POST['fEmail'];

    $sql = "SELECT * FROM usersbank
            WHERE user_email = '$address'";
    $query = mysqli_query($link,$sql) or die(mysqli_error($link));
    $digger = mysqli_num_rows($query);

    $dbcount = $digger;

    switch($dbcount)
    {
        case 0:
            switch ($diagnose) 
            {
                case 0:
                    $query = "INSERT INTO   usersbank 
                    (user_email, user_password, user_passcrypt, user_name, user_lastname, user_gender, user_birthday)
                            VALUES  
                            (
                                '{$_POST['fEmail']}',
                                '{$_POST['fPass']}',
                                '{$crypt}',
                                '{$_POST['fName']}',
                                '{$_POST['fLast']}',
                                '{$_POST['fSex']}',
                                '{$_POST['fBirth']}'
                            )";
                    mysqli_query($link, $query) or die(mysqli_error($link));

                    echo '<h2>Successfull</h2>';
                    echo "<h2><a href='../login.php'>go to Login</a></h2>";
                break;
        
                default:
                    echo "<br><h3>Don't let any input empty</h3><br>";
                    echo "<h4><a href='../registrator.php'>go to Register Page</a></h4>";
                    echo "<h4><a href='../login.php'>go to Login Page</a></h4>";
                break;
            }
        break;

        default:
            echo "<br><h3>Don't let any forms empty!<br>";
            echo "<h4><a href='../registrator.php'>go to Register Page</a></h4>";
            echo "<h4><a href='../login.php'>go to Login Page</a></h4>";
            die();
        break;
    }
}

?>