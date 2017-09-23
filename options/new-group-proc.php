<?php
include('../_base/outbasestuff-cms.php');
include('../_base/_cms-bar.php');

$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'generaldata') or die(mysqli_error($db));
?>

<title>Group Creator</title>

<?php

if($_POST['ngName']!='' && $_POST['ngFrom']!='' && $_POST['ngCode']!='' && $_POST['ngFounder']!='')
{
    $query = "INSERT INTO   g_bank 
                            (group_name, group_from, group_code, group_founder)
            VALUES  (
                        '{$_POST['ngName']}',
                        '{$_POST['ngFrom']}',
                        '{$_POST['ngCode']}',
                        '{$_POST['ngFounder']}'
                    )";
    mysqli_query($db, $query) or die(mysqli_error($db));

    echo "<div id='marginstart'></div>";
    echo "<h2 id='ngprocF'>Group Created</h2>";
}
else
{
    echo "<div id='marginstart'></div>";
    echo "<h3 id='ngprocF'>Don't let any input empty</h3>";
    echo "<form>
            <input Type='button' value='Back' onClick='history.go(-1);return true;' class='backbut'/>
          </form>";
}    

?>